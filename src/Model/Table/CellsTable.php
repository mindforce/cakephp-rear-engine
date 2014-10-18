<?php
namespace RearEngine\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cells Model
 */
class CellsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('cells');
		$this->displayField('title');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');
		$this->addBehavior('Tree');
		$this->addBehavior('CounterCache', ['Blocks' => ['cell_count']]);

		$this->belongsTo('Blocks', [
			'foreignKey' => 'block_id',
			'className' => 'RearEngine.Blocks',
		]);
		$this->belongsTo('ParentCells', [
			'className' => 'RearEngine.Cells',
			'foreignKey' => 'parent_id',
		]);
		$this->hasMany('ChildCells', [
			'className' => 'RearEngine.Cells',
			'foreignKey' => 'parent_id',
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
			->add('block_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('block_id', 'create')
			->notEmpty('block_id')
			->add('parent_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('parent_id')
			->validatePresence('title', 'create')
			->notEmpty('title')
			->validatePresence('slug', 'create')
			->notEmpty('slug')
			->allowEmpty('cell')
			->allowEmpty('text')
			->add('state', 'valid', ['rule' => 'boolean'])
			->validatePresence('state', 'create')
			->notEmpty('state')
			->add('lft', 'valid', ['rule' => 'numeric'])
			->allowEmpty('lft')
			->add('rght', 'valid', ['rule' => 'numeric'])
			->allowEmpty('rght')
			->allowEmpty('options')
			->validatePresence('visibility', 'create')
			->notEmpty('visibility')
			->allowEmpty('visible_on');

		return $validator;
	}

}
