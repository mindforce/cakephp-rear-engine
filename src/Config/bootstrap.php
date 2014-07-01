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

use Cake\Configure\Engine\PhpConfig;
use Cake\Core\Configure;
use Cake\Core\App;

Configure::write('App.paths.templates', array_merge(
	App::path('Template', 'RearEngine'),
	Configure::read('App.paths.templates')
));
