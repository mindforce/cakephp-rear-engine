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
namespace RearEngine\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

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
		$this->displayField('title');
		$this->primaryKey(['id']);
		//TODO: maybe a tricky way implemented in CakePHP 3.0 https://github.com/cakephp/cakephp/issues/3854
		$this->schema()->addColumn('options', ['type' => 'json']);
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
			->validatePresence('scope', 'create')
			->notEmpty('scope')
			->validatePresence('key', 'create')
			->notEmpty('key')
			->allowEmpty('value')
			->allowEmpty('title')
			->allowEmpty('description')
			->validatePresence('type', 'create')
			->notEmpty('type')
			->allowEmpty('default')
			->add('editable', 'valid', ['rule' => 'boolean'])
			->validatePresence('editable', 'create')
			->notEmpty('editable')
			->allowEmpty('options');

		return $validator;
	}

}
