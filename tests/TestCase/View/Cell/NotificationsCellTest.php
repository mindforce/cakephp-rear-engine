<?php
namespace RearEngine\Test\TestCase\View\Cell;

use RearEngine\View\Cell\NotificationsCell;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\View\Cell\NotificationsCell Test Case
 */
class NotificationsCellTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->request = $this->getMock('Cake\Network\Request');
		$this->response = $this->getMock('Cake\Network\Response');
		$this->Notifications = new NotificationsCell($this->request, $this->response);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Notifications);

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
