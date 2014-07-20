<?php
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
	public function display($key, $options = []) {
		foreach ($options['options'] as $engine=>$option){
			if (!$this->validateEngine($engine)){
				unset($options['options'][$engine]);
			}
		}
		$this->set(compact('key', 'options'));
		$this->template = '../Setting/display';
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
