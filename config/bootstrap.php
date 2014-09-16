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

use Cake\Core\Configure;
use Cake\Database\Type;
use Cake\Core\App;
use Cake\Event\EventManager;

Configure::write('App.paths.templates', array_merge(
	Configure::read('App.paths.templates'),
	App::path('Template', 'RearEngine')
));

try {
	Configure::load('config.php', 'default', true);
} catch (\Exception $e) {
	//die('Unable to load Config/settings.php. Create it by copying RearEngine/src/Config/app.default.php to Config/app.php.');
}
Configure::write('Routing.prefixes', ['admin']);
//debug(Configure::read());

Type::map('json', 'RearEngine\Database\Type\JsonType');


EventManager::instance()->attach(
	new RearEngine\Event\CoreEvent,
    null,
	['priority' => 1]
);