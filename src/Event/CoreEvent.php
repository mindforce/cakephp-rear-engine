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

class CoreEvent implements EventListenerInterface {

    public function implementedEvents() {
        return array(
	        'Controller.initialize' => array(
                'callable' => 'onControllerInit',
		        'priority' => 1
            ),
            'View.beforeLayout' => [
                'callable' => 'setDefaultViewAssets'
            ]
        );
    }

    public function onControllerInit($event) {
        $controller = $event->subject();
		if (isset($controller->request->params['prefix'])
			&&in_array($controller->request->params['prefix'], ['admin', 'Admin'])){

			//TODO: RearEngine as theme prevent override in app templates
            $controller->theme = 'RearEngine';
			if($theme = Configure::read('App.admin.theme'))
				if (Plugin::loaded($theme)) $controller->theme = $theme;

			foreach(Plugin::loaded() as $plugin){
				try {
					Configure::load($plugin.'.admin_menus', 'default', true);
				} catch (\Exception $e) {
					if(Configure::read('debug'))
						Log::warning('Unable to load app '.$plugin.'/Config/admin_menus config file', ['scope' => 'RearEngine plugin']);
				}
			}
			try {
				Configure::load('admin_menus', 'default', true);
			} catch (\Exception $e) {
				if(Configure::read('debug'))
					Log::warning('Unable to load App/Config/admin_menus config file.', ['scope' => 'RearEngine plugin']);
			}

		}
    }

    public function setDefaultViewAssets($event){
        $view = $event->subject();
        $params = $view->request->params;
        $path = Configure::read('App.webroot') . DS . '{asset}' . DS;
        $path .= (!empty($params['prefix']) ? Inflector::underscore($params['prefix']) . DS : '');
        $path .= Inflector::underscore($params['controller']). DS . Inflector::underscore($params['action']);
        if (isset($params['plugin'])&&!empty($params['plugin'])){
            $path = Plugin::path($params['plugin']). $path;
        } else {
            $path = ROOT . DS . $path;
        }
        $assetBase = $params['plugin'].'.';
        $assetBase .= (!empty($params['prefix']) ? Inflector::underscore($params['prefix']) . '/' : '');
        $assetBase .= Inflector::underscore($params['controller']).'/'.Inflector::underscore($params['action']);
        $cssPath = str_replace('{asset}', str_replace('/', '', Configure::read('App.cssBaseUrl')), $path).'.css';
        if(file_exists($cssPath)) {
            $view->Html->css($assetBase.'.css', ['block' => true]);
        }
        $jsPath = str_replace('{asset}', str_replace('/', '', Configure::read('App.jsBaseUrl')), $path).'.js';
        if(file_exists($jsPath)) {
            $view->Html->script($assetBase.'.js', ['block' => true]);
        }
    }

}
