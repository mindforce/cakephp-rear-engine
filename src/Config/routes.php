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

/* Front default routes */
Router::scope('/', function($routes) {
	$routes->plugin('RearEngine', function($routes) {
		$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);
		$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);
	});
});

/* Admin default routes */
Router::connect('/admin', ['prefix'=>'admin', 'plugin'=>'RearEngine', 'controller' => 'Dashboards', 'action' => 'index']);

Router::scope('/admin', function($routes) {
	$routes->connect('/settings', ['prefix' => 'admin', 'plugin'=>'RearEngine', 'controller' => 'Settings', 'action' => 'index']);
	$routes->plugin('RearEngine', function($routes) {
		$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);
		$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);
	});
});
