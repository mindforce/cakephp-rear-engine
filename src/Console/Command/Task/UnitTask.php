<?php
/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) iTeam s.r.o. (http://iteam-pro.com)
 * @link          http://iteam-pro.com RearEngine CakePHP 3 Plugin
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace RearEngine\Console\Command\Task;

use Cake\Console\Command\Task\BakeTask;

/**
 * Base class for RearEngine Unit Tasks.
 *
 */
class UnitTask extends BakeTask {

/**
 * Get the option parser for this task.
 *
 * This base class method sets up some commonly used options.
 *
 * @return \Cake\Console\ConsoleOptionParser
 */
	public function getOptionParser() {
		$parser = parent::getOptionParser();
		$parser->addOption('plugin', [
			'short' => 'p',
			'help' => __d('cake_console', 'Plugin to bake into.')
		])->addOption('force', [
			'short' => 'f',
			'boolean' => true,
			'help' => __d('cake_console', 'Force overwriting existing files without prompting.')
		])->addOption('connection', [
			'short' => 'c',
			'default' => 'default',
			'help' => __d('cake_console', 'The datasource connection to get data from.')
		])->removeOption('theme'
        );
		return $parser;
	}

}
