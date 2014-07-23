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
namespace RearEngine\Console\Command;

use Cake\Console\Command\BakeShell;
use Cake\Datasource\ConnectionManager;
use Cake\Console\ConsoleOptionParser;
use Cake\Core\Plugin;
use Cake\Utility\Inflector;
use Cake\Core\Configure;


/**
 * Engine shell command.
 */
class UnitShell extends BakeShell {

/**
 * main() method.
 *
 * @return bool|int Success or error code.
 */
	public function main() {
        //$connections = ConnectionManager::configured();
        //if (empty($connections)) {
        //    $this->out(__d('cake_console', 'Your database configuration was not found.'));
        //    $this->out(__d('cake_console', 'Add your database connection information to App/Config/app.php.'));
        //    return false;
        //}
        $this->out(__d('cake_console', '<info>Available RearEngine.unit commands:</info>'));
        $this->out('');
        foreach ($this->tasks as $task) {
            list($p, $name) = pluginSplit($task);
            $this->out('- ' . Inflector::underscore($name));
        }
        $this->out('');
        $this->out(__d('cake_console', 'By using <info>Console/cake RearEngine.unit [name]</info> you can invoke a specific unit task.'));
	}

/**
 * Locate the tasks bake will use.
 *
 * Scans the following paths for tasks that are subclasses of
 * Cake\Console\Command\Task\BakeTask:
 *
 * - Cake/Console/Command/Task/
 * - App/Console/Command/Task/
 * - Console/Command/Task for each loaded plugin
 *
 * @return void
 */
    public function loadTasks() {
        $tasks = [];
        $tasks = $this->_findTasks($tasks, APP, Configure::read('App.namespace'));
        foreach (Plugin::loaded() as $plugin) {
            $tasks = $this->_findTasks(
                $tasks,
                Plugin::classPath($plugin),
                Plugin::getNamespace($plugin),
                $plugin
            );
        }
        $this->tasks = array_values($tasks);
        parent::loadTasks();
    }

/**
 * Find bake tasks in a given set of files.
 *
 * @param array $files The array of files.
 * @return array An array of matching classes.
 */
    protected function _findTaskClasses($files) {
        $classes = [];
        foreach ($files as $className) {
            if (!class_exists($className)) {
                continue;
            }
            $reflect = new \ReflectionClass($className);
            if (!$reflect->isInstantiable()) {
                continue;
            }
            if (!$reflect->isSubclassOf('RearEngine\Console\Command\Task\UnitTask')) {
                continue;
            }
            $classes[] = $className;
        }
        return $classes;
    }

/**
 * Gets the option parser instance and configures it.
 *
 * @return \Cake\Console\ConsoleOptionParser
 */
    public function getOptionParser() {
        $parser = parent::getOptionParser();

        $parser->description(
            __d('cake_console', 'The Export script dumps data from database to file'
        ))->addOption('connection', [
            'help' => __d('cake_console', 'Database connection to use in RearEngine.unit shell.'),
            'short' => 'c',
            'default' => 'default'
        ])->removeOption('theme'
        );//->removeSubcommand('all'
        //);

        foreach ($this->_taskMap as $task => $config) {
            $taskParser = $this->{$task}->getOptionParser();
            $parser->addSubcommand(Inflector::underscore($task), [
                'help' => $taskParser->description(),
                'parser' => $taskParser
            ]);
        }

        return $parser;
    }

}
