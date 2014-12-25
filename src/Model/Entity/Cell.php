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
