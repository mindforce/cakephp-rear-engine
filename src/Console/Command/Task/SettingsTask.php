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

use RearEngine\Console\Command\Task\UnitTask;

/**
 * Language string extractor
 *
 */
class SettingsTask extends UnitTask{

    public function initialize(){
        parent::initialize();
        $this->loadModel('RearEngine.Settings');
    }

    public function export(){
        $settings = $this->Settings
            ->find('all')
            ->where(['Settings.plugin' => 'RearEngine'])
            ->all();
    }

    public function import(){

    }

/**
 * Get the option parser for this task.
 *
 * This base class method sets up some commonly used options.
 *
 * @return \Cake\Console\ConsoleOptionParser
 */
    public function getOptionParser() {
        $parser = parent::getOptionParser();
        $parser->description(
            __d('cake_console', 'Task to dump/restore available settings.')
        )->addSubcommand('export', [
            'help' => __d('cake_console', 'Exporting available settings to dumps.')
        ])->addSubcommand('import', [
            'help' => __d('cake_console', 'Import settings from previously dumped files.')
        ]);
        return $parser;
    }

}

