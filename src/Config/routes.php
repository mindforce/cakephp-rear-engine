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

use Cake\Routing\Router;

//TODO: Possible changes in new routing system test usage
Router::plugin('RearEngine', function($routes){
	$routes->prefix('admin', function($routes){
		$routes->connect('/', ['controller' => 'Dashboards', 'action' => 'index']);
		$routes->connect('/settings', ['controller' => 'Settings', 'action' => 'edit']);
	});
});
