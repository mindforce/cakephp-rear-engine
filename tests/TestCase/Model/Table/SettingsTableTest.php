<?php
namespace RearEngine\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use RearEngine\Model\Table\SettingsTable;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\Model\Table\SettingsTable Test Case
 */
class SettingsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'plugin.rear_engine.setting'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Settings') ? [] : ['className' => 'RearEngine\Model\Table\SettingsTable'];
		$this->Settings = TableRegistry::get('Settings', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Settings);

		parent::tearDown();
	}

}
