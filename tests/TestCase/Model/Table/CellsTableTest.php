<?php
namespace RearEngine\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use RearEngine\Model\Table\CellsTable;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\Model\Table\CellsTable Test Case
 */
class CellsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'plugin.rear_engine.cell',
		'plugin.rear_engine.block',
		'plugin.rear_engine.parent_cell',
		'plugin.rear_engine.child_cell'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Cells') ? [] : ['className' => 'RearEngine\Model\Table\CellsTable'];
		$this->Cells = TableRegistry::get('Cells', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cells);

		parent::tearDown();
	}

}
