<?php
namespace RearEngine\View\Cell;

use Cake\View\Cell;
use Cake\Core\Plugin;
use Cake\Core\Configure;
use Cake\Configure\Engine\PhpConfig;
use Cake\Utility\Hash;

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
			Configure::load($plugin.'.rear_menus.php', 'rear_menus', true);
		}
		try {
			Configure::load('rear_menus.php', 'rear_menus', true);
		} catch (\Exception $e) {
			//die('Unable to load Config/app.php. Create it by copying Config/app.default.php to Config/app.php.');
		}

		if(!empty($block)){
			$this->set('menu', Configure::read('RearEngine.menu.'.$block));
			$this->template = $block;
		}
	}

}
