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
namespace RearEngine\Event;

use Cake\Event\EventListener;
use Cake\Core\Plugin;
use Cake\Core\Configure;
use Cake\Log\Log;

class CoreEvent implements EventListener {

    public function implementedEvents() {
        return array(
	        'Controller.initialize' => array(
                'callable' => 'onControllerInit',
		        'priority' => 1
            ),
        );
    }

    public function onControllerInit($event) {
        $controller = $event->subject();
		if (isset($controller->request->params['prefix'])
			&&in_array($controller->request->params['prefix'], ['admin', 'Admin'])){

			//$controller->theme = 'Garderobe';
			if($theme = Configure::read('App.admin.theme'))
				if (Plugin::loaded($theme)) $controller->theme = $theme;

			foreach(Plugin::loaded() as $plugin){
				try {
					Configure::load($plugin.'.admin_menus.php', 'default', true);
				} catch (\Exception $e) {
					if(Configure::read('debug'))
						Log::write(LOG_ERR, 'Unable to load app '.$plugin.'/Config/admin_menus.php.');
				}
			}
			try {
				Configure::load('admin_menus.php', 'default', true);
			} catch (\Exception $e) {
				if(Configure::read('debug'))
					Log::write(LOG_ERR, 'Unable to load App/Config/admin_menus.php.');
			}

		}
    }
}