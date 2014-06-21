<?php
$config = [
	'button' => '<button class="btn {{class}}"{{attrs}}>{{text}}</button>',
	'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
	'inputContainerError' => '<div class="form-group {{type}}{{required}} error">{{content}}{{error}}</div>',
	'input' => '<input class="form-control {{class}}" type="{{type}}" name="{{name}}"{{attrs}}>{{help}}',
	'help' => '<p class="help-block">{{content}}</p>',
	'select' => '<select class="form-control {{class}}" name="{{name}}"{{attrs}}>{{content}}</select>',
	'selectMultiple' => '<select class="form-control {{class}}" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
	'static' => '<p class="form-control-static {{class}}"{{attrs}}>{{value}}</p>',
	'textarea' => '<textarea class="form-control {{class}}" name="{{name}}"{{attrs}}>{{value}}</textarea>',
	'submitContainer' => '<div class="btn-group">{{content}}</div>',
];
