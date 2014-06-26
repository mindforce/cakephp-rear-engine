<?php
namespace RearEngine\Controller;

use RearEngine\Controller\AppController;
//use RearEngine\View\Helper\BootstrapForm;

class DemosController extends AppController {

	public $helpers = [
		'Html',
	    'Form' => [
		    //'className' => 'RearEngine.BootstrapForm',
		    'errorClass' => 'has-error',
			'widgets' => [
				'static' => ['\RearEngine\View\Widget\StaticField'],
				'radio' => ['\RearEngine\View\Widget\Bootstrap3Radio', 'label']
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
