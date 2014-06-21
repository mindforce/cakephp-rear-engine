<?php
use Cake\Configure\Engine\PhpConfig;
use Cake\Core\Configure;
use Cake\Core\App;

Configure::write('App.paths.templates', array_merge(
	App::path('Template', 'RearEngine'),
	Configure::read('App.paths.templates')
));
