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

$config = [
	'basic' => '{{input}}{{label}}',
	'button' => '<button class="btn {{class}}"{{attrs}}>{{text}}</button>',
	'checkboxFormGroup' => '<label>{{input}}{{label}}</label>',
	'checkboxWrapper' => '<div class="checkbox">{{input}}{{label}}</div>',
	'checkboxContainer' => '<div class="checkbox input-{{type}}{{required}}">{{content}}</div>',
	'checkboxContainerError' => '<div class="checkbox {{type}}{{required}} has-error">{{content}}{{error}}</div>',
	'error' => '<span class="glyphicon glyphicon-remove form-control-feedback"></span><div class="error-message">{{content}}</div>',
	'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
	'inputContainerError' => '<div class="form-group input-{{type}}{{required}} has-error">{{content}}{{error}}</div>',
	'input' => '<input class="form-control {{class}}" type="{{type}}" name="{{name}}"{{attrs}}>{{help}}',
	'help' => '<p class="help-block">{{content}}</p>',
	'radioWrapper' => '<div class="radio">{{input}}{{label}}</div>',
	'select' => '<select class="form-control {{class}}" name="{{name}}"{{attrs}}>{{content}}</select>',
	'selectMultiple' => '<select class="form-control {{class}}" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
	'static' => '<p class="form-control-static {{class}}"{{attrs}}>{{value}}</p>',
	'textarea' => '<textarea class="form-control {{class}}" name="{{name}}"{{attrs}}>{{value}}</textarea>',
	'submitContainer' => '<div class="btn-group">{{content}}</div>',
];

