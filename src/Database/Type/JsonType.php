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
namespace RearEngine\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;

class JsonType extends Type {

/**
 * Casts given value from a PHP type to one acceptable by database
 *
 * @param mixed $value value to be converted to database equivalent
 * @param Driver $driver object from which database preferences and configuration will be extracted
 * @return mixed
 */
	public function toDatabase($value, Driver $driver) {
        return json_encode($value);
    }

/**
 * Casts given value from a database type to PHP equivalent
 *
 * @param mixed $value value to be converted to PHP equivalent
 * @param Driver $driver object from which database preferences and configuration will be extracted
 * @return mixed
 */
    public function toPHP($value, Driver $driver) {
        if ($value === null) {
            return null;
        }
        return json_decode($value, true);
    }

}