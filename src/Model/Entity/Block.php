<?php
namespace RearEngine\Model\Entity;

use Cake\ORM\Entity;

/**
 * Block Entity.
 */
class Block extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'title' => true,
		'slug' => true,
		'admin' => true,
		'cell_count' => true,
		'cells' => true,
	];

}
