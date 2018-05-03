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
namespace RearEngine\View\Cell;

use Cake\View\Cell;
use Cake\Core\Plugin;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Log\Log;

/**
 * Navigation cell
 */
class NavigationCell extends Cell {

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
    public $helpers = ['RearEngine.AdminMenu'];

    public function display($block = null) {
        if(!empty($block)){
            $this->set('menu', Configure::read('App.admin.menu.'.$block));
            $this->template = $block;
        }
    }

}
