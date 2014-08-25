<?php
namespace RearEngine\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Validation\Validator;
use Cake\Utility\Hash;
use Cake\Configure\Engine\PhpConfig;

/**
 * Settings Model
 */
class SettingsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('settings');
		$this->displayField('id');
		$this->primaryKey('id');

	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->validatePresence('plugin', 'create')
			->notEmpty('plugin')
			->validatePresence('key', 'create')
			->notEmpty('key')
			->allowEmpty('value');

		return $validator;
	}

	public function findExtended(Query $query, array $options = []) {
		$mapper = function($setting, $key, $mapReduce) {
			$prototype = $this->getSettingPrototype($setting->key, $setting->plugin);
			foreach ($prototype as $field=>$value){
				$setting->{$field} = $value;
			}
			$mapReduce->emit($setting, $key);
		};
		return $query->mapReduce($mapper);
	}

	public function findEditable(Query $query, array $options = []) {
		$mapper = function($setting, $key, $mapReduce) {
			$type = 'editable';
			if($setting->hidden == true) $type = 'hidden';
			$mapReduce->emitIntermediate($setting, $type);
		};
		$reducer = function($articles, $type, $mapReduce) {
		    $mapReduce->emit($articles, $type);
		};
		return $query->mapReduce($mapper, $reducer);
	}

	protected function getSettingPrototype($key, $plugin = null){
		$defaults = [
			'title' => null,
			'description' => null,
			'cell' => null,
			'default' => null,
			'options' => null,
			'hidden' => false,
		];
		//TODO: maybe implement cache for reader results or remember results in table class in future
		$settingsReader = new PhpConfig();
		$input = 'settings';
		if(!empty($plugin))
			$input = $plugin.'.settings';
		$settingPrtotypes = $settingsReader->read($input);

		return array_merge($defaults, Hash::extract($settingPrtotypes, '{n}[key='.$key.']')[0]);
	}


}
