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
namespace RearEngine\View\Cell;

use Cake\View\Cell;
use Cake\Core\App;
use Cake\Error;
use Cake\Cache\CacheEngine;

/**
 * CacheEngine cell
 */
class CacheEngineCell extends Cell {

/**
 * List of valid options that can be passed into this
 * cell's constructor.
 *
 * @var array
 */
	protected $_validCellOptions = [];

/**
 * Default display method.
 *
 * @return void
 */
	public function display($path, $options = []) {
		foreach ($options['options'] as $engine=>$option){
			if (!$this->validateEngine($engine)){
				unset($options['options'][$engine]);
			}
		}
		$this->set(compact('path', 'options'));
	}

	protected function validateEngine($class){
		$class = App::className($class, 'Cache/Engine', 'Engine');
		if(!$class) return false;

		try {
			$instance = new $class();
			if (!($instance instanceof CacheEngine)) {
				throw new Error\Exception(
					'Cache engines must use Cake\Cache\CacheEngine as a base class.'
				);
			}

			if ($instance->init()) {
				return true;
			}
			return false;
		} catch(Exception $e){
			return false;
		}
	}

}
