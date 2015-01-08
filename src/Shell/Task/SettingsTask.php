<?php
/**
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Mindforce Team (http://mindforce.me)
* @link          http://mindforce.me RearEngine CakePHP 3 Plugin
* @since         0.0.1
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
namespace RearEngine\Shell\Task;

use Bake\Shell\Task\BakeTask;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use Cake\Utility\Hash;

/**
 * Language string extractor
 *
 */
class SettingsTask extends BakeTask{

	public $plugin = null;

	public function startup() {
		parent::startup();

		if (isset($this->params['plugin'])) {
			$this->plugin = $this->params['plugin'];
		}
	}

	/*
	public function export(){
        $config = new PhpConfig();
        if($settings = $this->get()){
	        $settings = $this->cleanup($settings);
	        $settingsFile = 'settings';
            if(!empty($this->plugin))
	            $settingsFile = $this->plugin.'.settings';
            //$config->dump($settingsFile, $settings);
        }
    }
	*/

    public function import(){
	    $config = new PhpConfig();
	    $settingsFile = 'settings';
	    if(!empty($this->plugin))
		    $settingsFile = $this->plugin.'.'.$settingsFile;
        $data = $config->read($settingsFile);

	    $settings = TableRegistry::get('RearEngine.Settings');
	    foreach ($data as $row){
		    if ((!isset($row['plugin'])||empty($row['plugin']))&&!empty($this->plugin)) {
			    $row['plugin'] = $this->plugin;
		    }
		    $setting = $settings->newEntity([
			    'plugin' => $row['plugin'],
			    'path' => $row['path'],
			    'value' => (isset($row['default']) ? $row['default'] : ''),
		    ]);
		    $settings->save($setting);
	    }
    }

    public function get(){
        $settingsTable = $this->getTableObject('RearEngine.Settings');
        $queryOptions = [];
        $queryOptions['conditions'] = ['Settings.plugin' => ''];
        if(!empty($this->plugin))
            $queryOptions['conditions'] = ['Settings.plugin' => $this->plugin];

        $settings = $settingsTable->find('extended', $queryOptions);
        $_settings = [];
        foreach($settings as $key=>$setting){
            $_settings[] = $setting->toArray();
        }
        return $_settings;
    }


    protected function cleanup($rows){
	    $rows = Hash::filter($rows);
        foreach($rows as $key=>$row){
            unset($rows[$key]['id'], $rows[$key]['value']);
        }
        return $rows;
    }

/**
 * Get a model object for a class name.
 *
 * @param string $className Name of class you want model to be.
 * @param string $table Table name
 * @return \Cake\ORM\Table Table instance
 */
    public function getTableObject($className) {
        if (TableRegistry::exists($className)) {
            return TableRegistry::get($className);
        }
        return TableRegistry::get($className, [
            'name' => $className,
            'table' => Inflector::tableize($className),
            'connection' => ConnectionManager::get($this->connection)
        ]);
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
        )->addSubcommand('import', [
            'help' => __d('cake_console', 'Import settings from previously dumped files.')
        ]);//->addSubcommand('export', [
        //    'help' => __d('cake_console', 'Exporting available settings to dumps.')
        //]);
        return $parser;
    }

}
