<?php
$config = [
	'button' => '<button class="btn {{class}}"{{attrs}}>{{text}}</button>',
	'checkboxFormGroup' => '<label>{{input}}{{label}}</label>',
	'checkboxWrapper' => '<div class="checkbox"><label>{{input}}{{label}}</label></div>',
	'inputContainer' => '<div class="form-group input-{{type}}{{required}}">{{content}}</div>',
	'inputContainerError' => '<div class="form-group input-{{type}}{{required}} error">{{content}}{{error}}</div>',
	'input' => '<input class="form-control {{class}}" type="{{type}}" name="{{name}}"{{attrs}}>{{help}}',
	'help' => '<p class="help-block">{{content}}</p>',
	'radioWrapper' => '<div class="radio">{{input}}{{label}}</div>',
	'select' => '<select class="form-control {{class}}" name="{{name}}"{{attrs}}>{{content}}</select>',
	'selectMultiple' => '<select class="form-control {{class}}" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
	'static' => '<p class="form-control-static {{class}}"{{attrs}}>{{value}}</p>',
	'textarea' => '<textarea class="form-control {{class}}" name="{{name}}"{{attrs}}>{{value}}</textarea>',
	'submitContainer' => '<div class="btn-group">{{content}}</div>',
];
