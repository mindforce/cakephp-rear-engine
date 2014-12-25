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
?>

<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset(); ?>
	<title>
		<?= $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
	?>
		<!-- Core CSS - Include with every page -->
	<?php
		echo $this->Html->css([
			'bootstrap',
			'font-awesome',
			'sb-admin',
		]);
		echo $this->fetch('css');
	?>
	<!-- Core Scripts - Include with every page -->
	<?php
		echo $this->Html->script([
			'jquery-1.10.2',
			'bootstrap',
			'plugins/metisMenu/jquery.metisMenu',
			'sb-admin',
		]);
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<?= $this->Session->flash(); ?>

			<?= $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>
