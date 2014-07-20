<?php
namespace RearEngine\Test\TestCase\View\Cell;

use RearEngine\View\Cell\CacheEngineCell;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\View\Cell\CacheEngineCell Test Case
 */
class CacheEngineCellTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->request = $this->getMock('Cake\Network\Request');
		$this->response = $this->getMock('Cake\Network\Response');
		$this->CacheEngine = new CacheEngineCell($this->request, $this->response);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CacheEngine);

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
