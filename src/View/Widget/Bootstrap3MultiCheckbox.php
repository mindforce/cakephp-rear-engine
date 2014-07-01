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

namespace RearEngine\View\Widget;

use Cake\View\Widget\MultiCheckbox;
use Cake\View\Form\ContextInterface;

/**
 * Input widget class for generating multiple checkboxes.
 *
 */
class Bootstrap3MultiCheckbox extends MultiCheckbox {

/**
 * Render multi-checkbox widget.
 *
 * Data supports the following options.
 *
 * - `name` The name attribute of the inputs to create.
 *   `[]` will be appended to the name.
 * - `options` An array of options to create checkboxes out of.
 * - `val` Either a string/integer or array of values that should be
 *   checked. Can also be a complex options set.
 * - `disabled` Either a boolean or an array of checkboxes to disable.
 * - `escape` Set to false to disable HTML escaping.
 * - `options` An associative array of value=>labels to generate options for.
 * - `idPrefix` Prefix for generated ID attributes.
 *
 * ### Options format
 *
 * The options option can take a variety of data format depending on
 * the complexity of HTML you want generated.
 *
 * You can generate simple options using a basic associative array:
 *
 * {{{
 * 'options' => ['elk' => 'Elk', 'beaver' => 'Beaver']
 * }}}
 *
 * If you need to define additional attributes on your option elements
 * you can use the complex form for options:
 *
 * {{{
 * 'options' => [
 *   ['value' => 'elk', 'text' => 'Elk', 'data-foo' => 'bar'],
 * ]
 * }}}
 *
 * This form **requires** that both the `value` and `text` keys be defined.
 * If either is not set options will not be generated correctly.
 *
 * @param array $data The data to generate a checkbox set with.
 * @param \Cake\View\Form\ContextInterface $context The current form context.
 * @return string
 */
	public function render(array $data, ContextInterface $context) {
		$data += [
			'name' => '',
			'escape' => true,
			'inline' => false,
			'options' => [],
			'disabled' => null,
			'val' => null,
			'idPrefix' => null
		];
		$out = [];
		$this->_idPrefix = $data['idPrefix'];
		$this->_clearIds();
		foreach ($data['options'] as $key => $val) {
			$checkbox = [
				'value' => $key,
				'text' => $val,
			];
			if (is_array($val) && isset($val['text'], $val['value'])) {
				$checkbox = $val;
			}
			$checkbox['name'] = $data['name'];
			$checkbox['escape'] = $data['escape'];
			$checkbox['inline'] = $data['inline'];

			if ($this->_isSelected($key, $data['val'])) {
				$checkbox['checked'] = true;
			}
			if ($this->_isDisabled($key, $data['disabled'])) {
				$checkbox['disabled'] = true;
			}
			if (empty($checkbox['id'])) {
				$checkbox['id'] = $this->_id($checkbox['name'], $checkbox['value']);
			}

			$out[] = $this->_renderInput($checkbox, $context);
		}
		return implode('', $out);
	}

	/**
	 * Render a single checkbox & wrapper.
	 *
	 * @param array $checkbox An array containing checkbox key/value option pairs
	 * @param \Cake\View\Form\ContextInterface $context Context object.
	 * @return string
	 */
		protected function _renderInput($checkbox, $context) {
			$input = $this->_templates->format('checkbox', [
				'name' => $checkbox['name'] . '[]',
				'value' => $checkbox['escape'] ? h($checkbox['value']) : $checkbox['value'],
				'attrs' => $this->_templates->formatAttributes(
					$checkbox,
					['name', 'value', 'text']
				)
			]);

			$labelAttrs = [
				'for' => $checkbox['id'],
				'escape' => false,
				'text' => $this->_templates->format('basic', [
					'label' => $checkbox['text'],
					'input' => $input
				]),
				'input' => $input,
			];
			if (!empty($checkbox['checked']) && empty($labelAttrs['class'])) {
				$labelAttrs['class'] = 'selected';
			}

			if ($checkbox['inline']){
				if(!empty($labelAttrs['class'])) {
					$labelAttrs['class'] .= ' checkbox-inline';
				} else {
					$labelAttrs['class'] = 'checkbox-inline';
				}
				return $this->_label->render($labelAttrs, $context);
			}


			return $this->_templates->format('checkboxWrapper', [
				'label' => $this->_label->render($labelAttrs, $context),
				'input' => ''
			]);
		}

}
