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

use Cake\Core\Configure;
use Cake\Database\Type;
use Cake\Core\App;
use Cake\Event\EventManager;
use Cake\Core\Plugin;

Plugin::loadAll([
    ['ignoreMissing' => true, 'bootstrap' => true, 'routes' => true],
    'Garderobe/Bootstrap3',
    'Garderobe/BootstrapKit',
    'PlumSearch',
    'Search'
]);

Configure::write('App.paths.templates', array_merge(
	Configure::read('App.paths.templates'),
	App::path('Template', 'RearEngine')
));

try {
	Configure::load('config', 'default', true);
} catch (\Exception $e) {
	//die('Unable to load Config/settings file.');
}
Configure::write('Routing.prefixes', ['admin']);
//debug(Configure::read());

Type::map('json', 'RearEngine\Database\Type\JsonType');


EventManager::instance()->attach(
	new RearEngine\Event\CoreEvent,
    null,
	['priority' => 1]
);
