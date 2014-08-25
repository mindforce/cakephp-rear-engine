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
namespace RearEngine\Controller\Admin;

use RearEngine\Controller\AppController;
use Cake\Utility\Hash;
use RearEngine\Lib\Core\Settings;

/**
 * Settings Controller
 *
 * @property RearEngine\Model\Table\SettingsTable $Settings
 */
class SettingsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {

		if ($this->request->is(['post', 'put'])) {
			$settings = $this->Settings->find('all')->all();
			$settings = $this->Settings->patchEntities($settings, $this->request->data()['Setting']);
            $result = $this->Settings->connection()->transactional(function () use ($settings) {
                foreach ($settings as $setting) {
                    $result = $this->Settings->save($setting, ['atomic' => false]);
                    if(!$result) return false;
                }
                return true;
            });
			if ($result) {
				$settings = $this->Settings->find()
					->combine('key', 'value')
					->toArray();
				ksort($settings);
				$settings = Hash::expand($settings);
				Settings::dump('config.php', 'default', $settings);

				$this->Flash->success('The settings has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The settings could not be saved. Please, try again.');
			}
		}
		$settings = $this->Settings->find('extended')
			->find('editable')
			->toArray();
		$this->set('settings', $settings['editable']);
	}

}
