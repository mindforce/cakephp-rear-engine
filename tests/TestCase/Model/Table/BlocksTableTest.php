<?php
namespace RearEngine\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use RearEngine\Model\Table\BlocksTable;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\Model\Table\BlocksTable Test Case
 */
class BlocksTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'plugin.rear_engine.block',
		'plugin.rear_engine.cell'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Blocks') ? [] : ['className' => 'RearEngine\Model\Table\BlocksTable'];
		$this->Blocks = TableRegistry::get('Blocks', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Blocks);

		parent::tearDown();
	}

}
