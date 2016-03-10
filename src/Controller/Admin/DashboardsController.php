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
namespace RearEngine\Controller\admin;

use RearEngine\Controller\AppController;

/**
 * Dashboards Controller
 *
 */
class DashboardsController extends AppController {

	public $helpers = ['Platform.Block'];

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('Platform.Blocks');
		$blocks = $this->Blocks->find('all')
			->contain([
				'Cells' => function ($q) {
					return $q->where(['Cells.state' => true]);
			    }
			])->where([
				'Blocks.admin' => true,
			]);

		$this->set('blocks', $blocks);
	}

}
