<?php
namespace RearEngine\Test\TestCase\View\Cell;

use RearEngine\View\Cell\NavigationCell;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\View\Cell\NavigationCell Test Case
 */
class NavigationCellTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->request = $this->getMock('Cake\Network\Request');
		$this->response = $this->getMock('Cake\Network\Response');
		$this->Navigation = new NavigationCell($this->request, $this->response);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Navigation);

		parent::tearDown();
	}

}
