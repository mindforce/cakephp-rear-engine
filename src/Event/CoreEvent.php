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
namespace RearEngine\Event;

use Cake\Event\EventListenerInterface;
use Cake\Core\Plugin;
use Cake\Utility\Inflector;
use Cake\Core\Configure;
use Cake\Log\Log;

use Cake\Core\App;

class CoreEvent implements EventListenerInterface {

    public function implementedEvents() {
        return array(
	        'Controller.initialize' => array(
                'callable' => 'onControllerInit',
		        'priority' => 1
            ),
        );
    }

    public function onControllerInit($event) {
        $controller = $event->getSubject();
        if (isset($controller->request->params['prefix'])) {

            $menuFile = $controller->request->params['prefix'] . '_menus';
            if($theme = Configure::read('App.admin.theme')){
                if(($theme != '')&&($theme != 'RearEngine')&&Plugin::loaded($theme)){
                    $controller->viewBuilder()->theme($theme);
                }
            }

            foreach(Plugin::loaded() as $plugin) {
                try {
                    Configure::load($plugin.'.'.$menuFile, 'default', true);
                } catch (\Exception $e) {
                    if(Configure::read('debug')) {
                        Log::warning('Unable to load app '.$plugin.'/Config/' . $menuFile . ' config file', ['scope' => ['RearEngine plugin']]);
                    }
                }
            }

            try {
                Configure::load($menuFile, 'default', true);
            } catch (\Exception $e) {
                if(Configure::read('debug')){
                    Log::warning('Unable to load App/Config/' . $menuFile . ' config file.', ['scope' => ['RearEngine plugin']]);
                }
            }
        }
    }

}
