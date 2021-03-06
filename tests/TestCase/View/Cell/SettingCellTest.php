<?php
namespace RearEngine\Test\TestCase\View\Cell;

use RearEngine\View\Cell\SettingCell;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\View\Cell\SettingCell Test Case
 */
class SettingCellTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->request = $this->getMock('Cake\Network\Request');
		$this->response = $this->getMock('Cake\Network\Response');
		$this->Setting = new SettingCell($this->request, $this->response);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Setting);

		parent::tearDown();
	}

/**
 * testDisplay method
 *
 * @return void
 */
	public function testDisplay() {
		$this->markTestIncomplete('testDisplay not implemented.');
	}

}
