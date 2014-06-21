<?php
namespace RearEngine\Test\TestCase\View\Helper;

use Cake\View\View;
use RearEngine\View\Helper\Bootstrap3FormHelper;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\View\Helper\BootstrapFormHelper Test Case
 */
class BootstrapFormHelperTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$view = new View();
		$this->BootstrapFormHelper = new BootstrapFormHelper($view);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BootstrapFormHelper);

		parent::tearDown();
	}

}
