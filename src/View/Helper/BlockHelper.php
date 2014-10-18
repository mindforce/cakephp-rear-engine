<?php
namespace RearEngine\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Blocks helper
 */
class BlockHelper extends Helper {

/**
 * Default configuration.
 *
 * @var array
 */
	protected $_defaultConfig = [];

	public function render($block){
		foreach ($block->cells as $cell) {
			$cellName = 'RearEngine.Active';
			if(!empty($cell->cell)&&empty($cell->text)) {
				$cellName = $cell->cell;
			}
			if($block->admin) {
				$cellName .= '::admin';
			}
			$out = $this->_View->cell($cellName, ['cell' => $cell]);
			$this->_View->append($block->slug, $out);
		}
	}

}
