<?php
namespace RearEngine\Test\TestCase\View\Helper;

use Cake\View\View;
use RearEngine\View\Helper\AdminMenuHelper;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\View\Helper\RearMenuHelper Test Case
 */
class RearMenuHelperTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$view = new View();
		$this->RearMenu = new RearMenuHelper($view);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RearMenu);

		parent::tearDown();
	}

}
