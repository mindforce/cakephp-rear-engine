<?php

namespace RearEngine\View\Widget;

use Cake\View\Form\ContextInterface;
use Cake\View\Widget\WidgetInterface;

class StaticField implements WidgetInterface {

/**
 * StringTemplate instance.
 *
 * @var \Cake\View\StringTemplate
 */
	protected $_templates;

/**
 * Constructor.
 *
 * @param \Cake\View\StringTemplate $templates Templates list.
 */
	public function __construct($templates) {
		$this->_templates = $templates;
	}

	public function render(array $data, ContextInterface $context) {
		$value = '';
		if(isset($data['val'])) {
			$value = $data['val'];
		}
        return $this->_templates->format('static', [
            'value' => $value,
	        'attrs' => $this->_templates->formatAttributes($data, ['val', 'name', 'type'])
        ]);
    }

	public function secureFields(array $data) {
		return [];
	}

}