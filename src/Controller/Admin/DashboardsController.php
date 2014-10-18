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
namespace RearEngine\Controller\admin;

use RearEngine\Controller\AppController;

/**
 * Dashboards Controller
 *
 */
class DashboardsController extends AppController {

	public $helpers = ['RearEngine.Block'];

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('RearEngine.Blocks');
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
