<?php
/**
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Mindforce Team (http://mindforce.me)
* @link          http://mindforce.me RearEngine CakePHP 3 Plugin
* @since         0.0.1
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
namespace RearEngine\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Utility\Hash;
use Cake\Routing\Router;

/**
 * AdminMenu helper
 */
class AdminMenuHelper extends Helper {

/**
 * Default configuration.
 *
 * @var array
 */
	protected $_defaultConfig = [];

	public $helpers = ['Html'];

	protected $_levels = [
		0 => 'first',
		1 => 'second',
		2 => 'third'
	];

	public function render($data, $level = 0, $options = []){
		if(empty($data)) return '';

		$html = '';
		$data = Hash::sort($data, '{s}.weight');
		foreach($data as $class=>$menu){
			if(empty($menu)) continue;
			if(!isset($menu['options'])) $menu['options'] = [];
			$isDropdown = false;
			$liOptions = ['class' => ''];
			if(($level == 0)&&isset($menu['options']['dropdown'])&&!empty($menu['options']['dropdown'])){
				$isDropdown = true;
				$liOptions['class'] .= 'dropdown';
			}

			if(!isset($menu['type'])) $menu['type'] = 'link';
			$block = $this->{$menu['type']}($menu, $level);

			$nextLevel = $level+1;
			if($menu['type'] == 'link'){
				if(isset($menu['children'])&&!empty($menu['children'])&&($nextLevel < 3)){
					$childrenOptions = ['class' => 'nav nav-'.$this->_levels[$nextLevel].'-level'];
					if($isDropdown)
						$childrenOptions = ['class' => 'dropdown-menu '.$menu['options']['dropdown']];

					$block .= $this->render($menu['children'], $nextLevel, $childrenOptions);
				}
			}

			$liOptions['class'] .= $class;
			if((isset($menu['url'])&&$this->isLinkActive($menu['url']))
				||(preg_match("/active/i", $block))){
				$liOptions['class'] = ' active';
			}
			$html .= $this->Html->tag('li', $block, $liOptions);
		}
		return $this->Html->tag('ul', $html, $options);
	}

	protected function link($link, $level = 0){

		$isDropdown = false;
		if(($level == 0)&&isset($link['options']['dropdown'])&&!empty($link['options']['dropdown']))
			$isDropdown = true;

		if(!isset($link['title'])){
			$link['title'] = '';
			$link['options']['icon'] = 'fa fa-ellipsis-v';
		}
		if(isset($link['options']['icon'])){
			$link['title'] = $this->Html->tag('i',
				'',
				['class' => $link['options']['icon'].' fa-fw']
			).' '.$link['title'];
		}

		if(!isset($link['url']))
			$link['url'] = '#';

		if(isset($link['children'])&&!empty($link['children'])){
			$pointer = 'arrow';
			if($isDropdown) $pointer = 'fa-caret-down';
			$link['title'] .= $this->Html->tag('span', '', ['class' => 'fa '.$pointer]);

		}

		$aOptions = ['escape' => false];
		if($isDropdown){
			$aOptions = Hash::merge($aOptions, [
				'class' => 'dropdown-toggle',
				'data-toggle' => 'dropdown'
			]);
			$link['url'] = '#';
		}
		return $this->Html->link($link['title'], $link['url'], $aOptions);

	}

	protected function cell($cell, $level = 0){
		$options = ['options' => $cell['options']];
		if(isset($cell['children'])){
			$options['children'] = $cell['children'];
		}
		return $this->_View->cell($cell['cell'], $options);
	}

	protected function divider($cell, $level = 0){
		return $this->separator($cell, $level);
	}

	protected function separator($cell, $level = 0){
		return $this->Html->tag('div', '', ['role' => 'separator', 'class' => 'divider']);
	}

	public function isLinkActive($url){
		//TODO: Maybe more intelligent active link detection
		$currentUrl = Router::url($this->request->params);
		if(!empty($this->request->base)||($this->request->base != '/')){
			$currentUrl = str_replace($this->request->base, '', $currentUrl);
		}
		if(!is_array($url)){
			$url = Router::parse($url);
		}
		$url = Router::normalize($url);
		return (boolean)preg_match("/^(".preg_quote($url, "/").")(\/?\?{0}|\/?\?{1}.*)$/i", trim($currentUrl));
	}

}
