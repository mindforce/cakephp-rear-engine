<?php
/**
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Mindforce Team (http://mindforce.me)
* @link          http://mindforce.me RearEngine CakePHP 3 Plugin
* @since         0.0.1
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error;
use Cake\Utility\Debugger;
use Cake\Validation\Validation;

if (!Configure::read('debug')):
	throw new Error\NotFoundException();
endif;
?>
<iframe src="http://cakephp.org/bake-banner" width="830" height="160" style="overflow:hidden; border:none;">
</iframe>
<h2>Release Notes for CakePHP <?= Configure::version() ?></h2>
<p>
	<a href="http://cakephp.org/changelogs/<?= Configure::version() ?>">Read the changelog</a>
</p>
<?php
if (Configure::read('debug')):
	Debugger::checkSecurityKeys();
endif;
?>
<div id="url-rewriting-warning" class="alert alert-danger">
	URL rewriting is not properly configured on your server.
	1) <a target="_blank" href="http://book.cakephp.org/3.0/en/installation/url-rewriting.html" class="alert-link">Help me configure it</a>
	2) <a target="_blank" href="http://book.cakephp.org/3.0/en/development/configuration.html#general-configuration" class="alert-link">I don't / can't use URL rewriting</a>
</div>
<?php
	if (version_compare(PHP_VERSION, '5.4.19', '>=')):
		echo '<div class="alert alert-success">Your version of PHP is 5.4.19 or higher.</div>';
	else:
		echo '<div class="alert alert-danger">Your version of PHP is too low. You need PHP 5.4.19 or higher to use CakePHP.</div>';
	endif;
	if (extension_loaded('mbstring')):
		echo '<div class="alert alert-success">Your version of PHP has the mbstring extension loaded.</div>';
	else:
		echo '<div class="alert alert-danger">Your version of PHP does NOT have the mbstring extension loaded.</div>';
	endif;
	if (extension_loaded('mcrypt')):
		echo '<div class="alert alert-success">Your version of PHP has the mcrypt extension loaded.</div>';
	else:
		echo '<div class="alert alert-danger">Your version of PHP does NOT have the mcrypt extension loaded.</div>';
	endif;
	if (extension_loaded('intl')):
		echo '<div class="alert alert-success">Your version of PHP has the intl extension loaded.</div>';
	else:
		echo '<div class="alert alert-danger">Your version of PHP does NOT have the intl extension loaded.</div>';
	endif;
	if (is_writable(TMP)):
		echo '<div class="alert alert-success">Your tmp directory is writable.</div>';
	else:
		echo '<div class="alert alert-warning">Your tmp directory is NOT writable.</div>';
	endif;
	$settings = Cache::config('_cake_model_');
	if (!empty($settings)):
		echo '<div class="alert alert-success">';
			echo 'The <em>'. $settings['className'] . 'Engine</em> is being used for core caching. To change the config edit APP/Config/app.php';
		echo '</div>';
	else:
		echo '<div class="alert alert-warning">';
			echo 'Your cache is NOT working. Please check the settings in config/app.php';
		echo '</div>';
	endif;

	try {
		$connection = ConnectionManager::get('default');
		$connected = $connection->connect();
	} catch (Exception $connectionError) {
		$connected = false;
		$errorMsg = $connectionError->getMessage();
		if (method_exists($connectionError, 'getAttributes')):
			$attributes = $connectionError->getAttributes();
			if (isset($errorMsg['message'])):
				$errorMsg .= '<br />' . $attributes['message'];
			endif;
		endif;
	}
	if ($connected):
		echo '<div class="alert alert-success">CakePHP is able to connect to the database.</div>';
	else:
		echo '<div class="alert alert-warning">';
			echo 'CakePHP is NOT able to connect to the database.';
			echo '<br /><br />';
			echo $errorMsg;
		echo '</div>';
	endif;
?>

<h3>Editing this Page</h3>
<p>
	To change the content of this page, edit: src/Template/Pages/home.ctp.<br />
	To change its layout, edit: src/Template/Layout/default.ctp.<br />
	You can also add some CSS styles for your pages at: webroot/css/.
</p>

<h3>Getting Started</h3>
<p>
	<a target="_blank" href="http://book.cakephp.org/3.0/en/">CakePHP 3.0 Docs</a>
</p>
<p>
	<a target="_blank" href="http://book.cakephp.org/3.0/en/tutorials-and-examples/blog/blog.html">The 15 min Blog Tutorial</a>
</p>

<!--<h3>Official Plugins</h3>
<p>
<ul>
	<li>
		<a href="https://github.com/cakephp/debug_kit">DebugKit</a>
		provides a debugging toolbar and enhanced debugging tools for CakePHP applications.
	</li>
	<li>
		<a href="https://github.com/cakephp/localized">Localized</a>
		contains various localized validation classes and translations for specific countries.
	</li>
</ul>
</p>-->

<h3>More about Cake</h3>
<p>
	CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.
</p>
<p>
	Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.
</p>

<ul>
	<li><a href="http://cakefoundation.org/">Cake Software Foundation</a>
	<ul><li>Promoting development related to CakePHP</li></ul></li>
	<li><a href="http://www.cakephp.org">CakePHP</a>
	<ul><li>The Rapid Development Framework</li></ul></li>
	<li><a href="http://book.cakephp.org/3.0/en/">CakePHP Documentation</a>
	<ul><li>Your Rapid Development Cookbook</li></ul></li>
	<li><a href="http://api.cakephp.org/3.0/">CakePHP API</a>
	<ul><li>Quick Reference</li></ul></li>
	<li><a href="http://bakery.cakephp.org">The Bakery</a>
	<ul><li>Everything CakePHP</li></ul></li>
	<li><a href="http://plugins.cakephp.org">CakePHP plugins repo</a>
	<ul><li>A comprehensive list of all CakePHP plugins created by the community</li></ul></li>
	<li><a href="https://groups.google.com/group/cake-php">CakePHP Google Group</a>
	<ul><li>Community mailing list</li></ul></li>
	<li><a href="irc://irc.freenode.net/cakephp">irc.freenode.net #cakephp</a>
	<ul><li>Live chat about CakePHP</li></ul></li>
	<li><a href="https://github.com/cakephp/">CakePHP Code</a>
	<ul><li>For the Development of CakePHP Git repository, Downloads</li></ul></li>
	<li><a href="https://github.com/cakephp/cakephp/issues">CakePHP Issues</a>
	<ul><li>CakePHP issues and pull requests</li></ul></li>
</ul>
