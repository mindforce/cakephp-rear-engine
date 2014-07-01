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

namespace RearEngine\View\Helper;

use Cake\View\Helper\FormHelper;
use Cake\Utility\Inflector;

/**
 * Bootstrap3FormHelper helper
 */
class Bootstrap3FormHelper extends FormHelper {

/**
 * Generates a form input element complete with label and wrapper div
 *
 * ### Options
 *
 * See each field type method for more information. Any options that are part of
 * $attributes or $options for the different **type** methods can be included in `$options` for input().i
 * Additionally, any unknown keys that are not in the list below, or part of the selected type's options
 * will be treated as a regular html attribute for the generated input.
 *
 * - `type` - Force the type of widget you want. e.g. `type => 'select'`
 * - `label` - Either a string label, or an array of options for the label. See FormHelper::label().
 * - `options` - For widgets that take options e.g. radio, select.
 * - `error` - Control the error message that is produced. Set to `false` to disable any kind of error reporting (field
 *    error and error messages).
 * - `empty` - String or boolean to enable empty select box options.
 *
 * @param string $fieldName This should be "Modelname.fieldname"
 * @param array $options Each type of input takes different options.
 * @return string Completed form widget.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#creating-form-elements
 */
	public function input($fieldName, array $options = []) {
		$options += [
			'type' => null,
			'label' => null,
			'error' => null,
			'required' => null,
			'options' => null,
			'templates' => []
		];
		$options = $this->_parseOptions($fieldName, $options);
		$options += ['id' => $this->_domId($fieldName)];

		$originalTemplates = $this->templates();
		$newTemplates = $options['templates'];

		if ($newTemplates) {
			$this->templates($options['templates']);
		}
		unset($options['templates']);

		$error = null;
		$errorSuffix = '';
		if ($options['type'] !== 'hidden' && $options['error'] !== false) {
			$error = $this->error($fieldName, $options['error']);
			$errorSuffix = empty($error) ? '' : 'Error';
			unset($options['error']);
		}

		$template = $options['type'] . 'Container' . $errorSuffix;
		if (!$this->templates($template)) {
			$template = 'inputContainer' . $errorSuffix;
		}

		$label = $options['label'];
		if ($options['type'] !== 'radio') {
			unset($options['label']);
		}

		$input = $this->_getInput($fieldName, $options);
		if ($options['type'] === 'hidden') {
			$this->templates($originalTemplates);
			return $input;
		}


		if($options['type'] === 'checkbox'){
			if ($label === null) {
				$label = $fieldName;
				if (substr($label, -5) === '._ids') {
					$text = substr($label, 0, -5);
				}
				if (strpos($label, '.') !== false) {
					$fieldElements = explode('.', $label);
					$label = array_pop($fieldElements);
				}
				if (substr($label, -3) === '_id') {
					$label = substr($label, 0, -3);
				}
				$label = __(Inflector::humanize(Inflector::underscore($label)));
			}
			$checkboxOptions['escape'] = false;
			$label = $this->label($fieldName, $input.$label, $checkboxOptions);
			$input = '';
		} else {
			$label = $this->_getLabel($fieldName, compact('input', 'label', 'error') + $options);
		}

		$result = $this->formatTemplate('formGroup', compact('input', 'label', 'error'));

		$result = $this->formatTemplate($template, [
			'content' => $result,
			'error' => $error,
			'required' => $options['required'] ? ' required' : '',
			'type' => $options['type'],
		]);


		if ($newTemplates) {
			$this->templates($originalTemplates);
		}

		return $result;
	}

}
