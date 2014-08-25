<?php
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
		'plugin' => false,
		'key' => false,
		'value' => true,
	];

}
