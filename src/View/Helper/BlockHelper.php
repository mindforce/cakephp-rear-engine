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
