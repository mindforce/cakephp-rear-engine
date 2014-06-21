<?php
namespace RearEngine\Test\TestCase\View\Cell;

use RearEngine\View\Cell\SearchToolsCell;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\View\Cell\SearchToolsCell Test Case
 */
class SearchToolsCellTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->request = $this->getMock('Cake\Network\Request');
		$this->response = $this->getMock('Cake\Network\Response');
		$this->SearchTools = new SearchToolsCell($this->request, $this->response);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SearchTools);

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
