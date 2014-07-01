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

namespace RearEngine\View\Cell;

use Cake\View\Cell;
use Cake\Core\Plugin;
use Cake\Core\Configure;
use Cake\Configure\Engine\PhpConfig;
use Cake\Log\Log;

/**
 * Navigation cell
 */
class NavigationCell extends Cell {

/**
 * List of valid options that can be passed into this
 * cell's constructor.
 *
 * @var array
 */
	protected $_validCellOptions = [];

/**
 * Default display method.
 *
 * @return void
 */
	public $helpers = ['RearEngine.RearMenu'];

	public function display($block = null) {
		//TODO: probably move to beforeFilter with admin setection
		Configure::config('rear_menus', new PhpConfig());
		if(Configure::read('debug')){
			Configure::load('RearEngine.demo_menus.php', 'rear_menus', true);
		}
		foreach(Plugin::loaded() as $plugin){
			try {
				Configure::load($plugin.'.rear_menus.php', 'rear_menus', true);
			} catch (\Exception $e) {
				Log::write(LOG_ERR, 'Unable to load app '.$plugin.'.rear_menus.php.');
			}
		}
		try {
			Configure::load('rear_menus.php', 'rear_menus', true);
		} catch (\Exception $e) {
			Log::write(LOG_ERR, 'Unable to load app rear_menus.php.');
		}

		if(!empty($block)){
			$this->set('menu', Configure::read('RearEngine.menu.'.$block));
			$this->template = $block;
		}
	}

}
