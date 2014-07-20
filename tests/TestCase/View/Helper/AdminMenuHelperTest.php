<?php
namespace RearEngine\Test\TestCase\View\Helper;

use Cake\View\View;
use RearEngine\View\Helper\AdminMenuHelper;
use Cake\TestSuite\TestCase;

/**
 * AdminEngine\View\Helper\RearMenuHelper Test Case
 */
class AdminMenuHelperTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$view = new View();
		$this->AdminMenu = new AdminMenuHelper($view);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AdminMenu);

		parent::tearDown();
	}

}
