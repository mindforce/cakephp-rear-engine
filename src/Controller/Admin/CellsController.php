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
namespace RearEngine\Controller\Admin;

use RearEngine\Controller\AppController;

/**
 * Cells Controller
 *
 * @property RearEngine\Model\Table\CellsTable $Cells
 */
class CellsController extends AppController {

	public function initialize()
    {
		parent::initialize();
        $this->loadModel('Platform.Cells');
    }

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('cells', $this->paginate($this->Cells));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$cell = $this->Cells->get($id, [
			'contain' => []
		]);
		$this->set('cell', $cell);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$cell = $this->Cells->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Cells->save($cell)) {
				$this->Flash->success('The cell has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The cell could not be saved. Please, try again.');
			}
		}
		$this->set(compact('cell'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$cell = $this->Cells->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$cell = $this->Cells->patchEntity($cell, $this->request->data);
			if ($this->Cells->save($cell)) {
				$this->Flash->success('The cell has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The cell could not be saved. Please, try again.');
			}
		}
		$this->set(compact('cell'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$cell = $this->Cells->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Cells->delete($cell)) {
			$this->Flash->success('The cell has been deleted.');
		} else {
			$this->Flash->error('The cell could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
