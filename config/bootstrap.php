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
    'Platform',
    'Garderobe/Bootstrap3',
    'Garderobe/BootstrapKit',
    'PlumSearch',
    'Search'
]);

// Setup RearEngine as theme does not provide layout and view overriding
// so we just add it as additional templates path
Configure::write('App.paths.templates', array_merge(
    //Support for overrides via app RearEngine plugin template
    [APP . 'Template' . DS . 'Plugin' . DS . 'RearEngine' . DS],
    //Support for default RearEngine plugin template
    App::path('Template', 'RearEngine'),
    //Do not forget for default Cake paths
    App::path('Template')
));

Configure::write('Routing.prefixes', ['admin']);

EventManager::instance()->attach(
	new RearEngine\Event\CoreEvent,
    null,
	['priority' => 2]
);
