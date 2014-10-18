<?php
namespace RearEngine\View\Cell;

use Cake\View\Cell;

/**
 * AdminBlock cell
 */
class ActiveCell extends Cell {

/**
 * List of valid options that can be passed into this
 * cell's constructor.
 *
 * @var array
 */
	protected $_validCellOptions = [];

/**
 * Default display method.
 *
 * @return void
 */
	public function admin($cell) {
		$this->set('cell', $cell);
	}

}
