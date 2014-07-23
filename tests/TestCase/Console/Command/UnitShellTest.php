<?php
namespace RearEngine\Test\TestCase\Console\Command;

use RearEngine\Console\Command\ExportShell;
use Cake\TestSuite\TestCase;

/**
 * RearEngine\Console\Command\UnitShell Test Case
 */
class UnithellTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->io = $this->getMock('Cake\Console\ConsoleIo');
		$this->Unit = new UnitShell($this->io);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Unit);

		parent::tearDown();
	}

/**
 * testMain method
 *
 * @return void
 */
	public function testMain() {
		$this->markTestIncomplete('testMain not implemented.');
	}

}
