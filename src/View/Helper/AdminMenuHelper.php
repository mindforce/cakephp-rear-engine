<?php
/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) iTeam s.r.o. (http://iteam-pro.com)
 * @link          http://iteam-pro.com RearEngine CakePHP 3 Plugin
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace RearEngine\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Utility\Hash;

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
			if(!isset($menu['options'])) $menu['options'] = [];
			$isDropdown = false;
			$liOptions = ['class' => ''];

			if(!isset($menu['type'])) $menu['type'] = 'link';
			$block = $this->{$menu['type']}($menu, $level);

			$nextLevel = $level+1;
			if(isset($menu['children'])&&!empty($menu['children'])&&($nextLevel < 3)){
				$block .= $this->render($menu['children'], $nextLevel);
			}

			$liOptions['class'] .= $class;
			$html .= $this->Html->tag('li', $block, $liOptions);
		}
		return $this->Html->tag('ul', $html, $options);
	}
	protected function cell($cell, $level = 0){

		return $this->_View->cell($cell['cell'], ['options' => $cell['options']]);
	}

	protected function link($link, $level = 0){

		if(!isset($link['url']))
			$link['url'] = '#';

		$aOptions = ['escape' => false];

		return $this->Html->link($link['title'], $link['url'], $aOptions);

	}

}
