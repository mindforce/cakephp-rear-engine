<?php
/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) iTeam s.r.o. (http://iteam-pro.org)
 * @link          http://iteam-pro.com RearEngine Project
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
			'RearEngine.bootstrap',
			'RearEngine.font-awesome',
			'RearEngine.sb-admin',
		]);
		echo $this->fetch('css');
	?>
	<!-- Core Scripts - Include with every page -->
	<?php
		echo $this->Html->script([
			'RearEngine.jquery-1.10.2',
			'RearEngine.bootstrap',
			'RearEngine.plugins/metisMenu/jquery.metisMenu',
			'RearEngine.sb-admin',
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
