<?php
namespace RearEngine\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blocks Model
 */
class BlocksTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('rear_engine_blocks');
		$this->displayField('title');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->hasMany('Cells', [
			'foreignKey' => 'block_id',
			'className' => 'RearEngine.Cells',
		]);
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
			->validatePresence('title', 'create')
			->notEmpty('title')
			->validatePresence('slug', 'create')
			->notEmpty('slug')
			->add('admin', 'valid', ['rule' => 'boolean'])
			->allowEmpty('admin')
			->add('cell_count', 'valid', ['rule' => 'numeric'])
			->validatePresence('cell_count', 'create')
			->notEmpty('cell_count');

		return $validator;
	}

}
