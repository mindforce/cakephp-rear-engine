<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace RearEngine\View\Widget;

use Cake\View\Widget\Radio;
use Cake\View\Form\ContextInterface;

/**
 * Input widget class for generating a set of radio buttons.
 *
 * This class is intended as an internal implementation detail
 * of Cake\View\Helper\FormHelper and is not intended for direct use.
 */
class Bootstrap3Radio extends Radio {

	public function render(array $data, ContextInterface $context) {
		$data += [
			'inline' => false,
		];
		if ($data['options'] instanceof Traversable) {
			$data['options'] = iterator_to_array($data['options']);
		} else {
			$data['options'] = (array)$data['options'];
		}
		$output = '';
		if (is_string($data['label'])&&(count($data['options']) != 1))
			$output = $this->_label->render(['text' => $data['label']], $context);
		return $output.' '.parent::render($data, $context);
	}
/**
 * Renders a single radio input and label.
 *
 * @param string|int $val The value of the radio input.
 * @param string|array $text The label text, or complex radio type.
 * @param array $data Additional options for input generation.
 * @param \Cake\View\Form\ContextInterface $context The form context
 * @return string
 */
	protected function _renderInput($val, $text, $data, $context) {
		$escape = $data['escape'];
		if (is_int($val) && isset($text['text'], $text['value'])) {
			$radio = $text;
			$text = $radio['text'];
		} else {
			$radio = ['value' => $val, 'text' => $text];
		}
		$radio['name'] = $data['name'];

		if (empty($radio['id'])) {
			$radio['id'] = $this->_id($radio['name'], $radio['value']);
		}

		if (isset($data['val']) && is_bool($data['val'])) {
			$data['val'] = $data['val'] ? 1 : 0;
		}

		if (isset($data['val']) && strval($data['val']) === strval($radio['value'])) {
			$radio['checked'] = true;
		}

		if ($this->_isDisabled($radio, $data['disabled'])) {
			$radio['disabled'] = true;
		}
		if (!empty($data['required'])) {
			$radio['required'] = true;
		}
		if (!empty($data['form'])) {
			$radio['form'] = $data['form'];
		}

		$input = $this->_templates->format('radio', [
			'name' => $radio['name'],
			'value' => $escape ? h($radio['value']) : $radio['value'],
			'attrs' => $this->_templates->formatAttributes($radio, ['name', 'value', 'text']),
		]);

		$radio['text'] = $input.$radio['text'];


		if (!empty($data['inline'])) {
			$radio['class'] = 'radio-inline';
		}
		$label = $this->_renderLabel(
			$radio,
			$data['label'],
			$input,
			$context,
			false
		);
		if (empty($data['inline'])) {
			return $this->_templates->format('radioWrapper', [
				'input' => '',
				'label' => $label,
			]);
		}

		return $label;
	}
/**
 * Renders a label element for a given radio button.
 *
 * In the future this might be refactored into a separate widget as other
 * input types (multi-checkboxes) will also need labels generated.
 *
 * @param array $radio The input properties.
 * @param false|string|array $label The properties for a label.
 * @param string $input The input widget.
 * @param \Cake\View\Form\ContextInterface $context The form context.
 * @param bool $escape Whether or not to HTML escape the label.
 * @return string Generated label.
 */
	protected function _renderLabel($radio, $label, $input, $context, $escape) {
		if ($label === false) {
			return false;
		}
		$labelAttrs = is_array($label) ? $label : [];
		$labelAttrs += [
			'for' => $radio['id'],
			'escape' => $escape,
			'text' => $radio['text'],
			'input' => $input,
		];
		if(isset($radio['class']))
			$labelAttrs['class'] = $radio['class'];

		return $this->_label->render($labelAttrs, $context);
	}

}
