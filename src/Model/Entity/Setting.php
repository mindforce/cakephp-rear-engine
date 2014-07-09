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
namespace RearEngine\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setting Entity.
 */
class Setting extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'scope' => false,
		'key' => false,
		'value' => true,
		'title' => false,
		'description' => false,
		'type' => false,
		'default' => false,
		'editable' => false,
		'options' => false,
	];

}
