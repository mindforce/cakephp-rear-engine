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
namespace RearEngine\Lib\Core;

use Cake\Error\Exception;
use Cake\Core\Configure;

class Settings extends Configure {

/**
 * Dump data currently in Configure into $key. The serialization format
 * is decided by the config engine attached as $config. For example, if the
 * 'default' adapter is a PhpConfig, the generated file will be a PHP
 * configuration file loadable by the PhpConfig.
 *
 * ## Usage
 *
 * Given that the 'default' engine is an instance of PhpConfig.
 * Save specifide data in Configure format to the file `my_config.php`:
 *
 * `Configure::dump('my_config.php', 'default');`
 *
 * Save only the error handling configuration:
 *
 * `Configure::dump('error.php', 'default', ['debug' => 0];`
 *
 * @param string $key The identifier to create in the config adapter.
 *   This could be a filename or a cache key depending on the adapter being used.
 * @param string $config The name of the configured adapter to dump data with.
 * @param array $values The values array to be dumped in structured format.
 *   This allows you save only some data stored in Configure.
 * @return bool success
 * @throws \Cake\Error\Exception if the adapter does not implement a `dump` method.
 */
	public static function dump($key, $config = 'default', $values = []) {
		$engine = static::_getEngine($config);
		if (!$engine) {
			throw new Exception(sprintf('There is no "%s" config engine.', $config));
		}
		if (!method_exists($engine, 'dump')) {
			throw new Exception(sprintf('The "%s" config engine, does not have a dump() method.', $config));
		}
		return (bool)$engine->dump($key, $values);
	}

}
