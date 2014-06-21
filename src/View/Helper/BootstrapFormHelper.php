<?php
namespace RearEngine\View\Helper;

use Cake\View\Helper\FormHelper;
use Cake\View\View;

/**
 * BootstrapFormHelper helper
 */
class BootstrapFormHelper extends FormHelper {

	public function __construct(View $View, array $config = []) {
		parent::__construct($View, $config);
		//debug($this->_config);
	}

}
