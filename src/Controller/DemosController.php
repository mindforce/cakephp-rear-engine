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

namespace RearEngine\Controller;

use RearEngine\Controller\AppController;
//use RearEngine\View\Helper\BootstrapForm;

class DemosController extends AppController {

	public $helpers = [
		'Html',
	    'Form' => [
		    'className' => 'RearEngine.Bootstrap3Form',
		    'errorClass' => 'has-error',
			'widgets' => [
				//Standard Widgets override
				'multicheckbox' => ['RearEngine\View\Widget\Bootstrap3MultiCheckbox', 'label'],
				'radio' => ['RearEngine\View\Widget\Bootstrap3Radio', 'label'],
				//Rearengine specific fields
				'static' => ['RearEngine\View\Widget\StaticBox'],
			],
		    'templateClass' => 'RearEngine\View\ExtendedStringTemplate',
			'templates' => 'RearEngine.bootstrap3_form.php',
	    ]
	];

	public function index(){
	}

	public function blank(){
	}

	public function buttons(){
	}

	public function flot(){
	}

	public function forms(){
	}

	public function grid(){
	}

	public function login(){
		$this->layout = 'RearEngine.login';
	}

	public function morris(){
	}

	public function notifications(){
	}

	public function panels_wells(){
	}

	public function tables(){
	}

	public function typography(){
	}

}
