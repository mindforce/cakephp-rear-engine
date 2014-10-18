<?php
namespace RearEngine\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cell Entity.
 */
class Cell extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'block_id' => true,
		'parent_id' => true,
		'title' => true,
		'slug' => true,
		'cell' => true,
		'text' => true,
		'state' => true,
		'lft' => true,
		'rght' => true,
		'options' => true,
		'visibility' => true,
		'visible_on' => true,
		'block' => true,
		'parent_cell' => true,
		'child_cells' => true,
	];

}
