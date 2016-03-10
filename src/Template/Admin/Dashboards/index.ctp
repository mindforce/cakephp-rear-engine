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
<?php $this->extend('/Admin/Common/form'); ?>

<?php
$this->assign('title', __d('rear_engine', 'Dashboard'));

foreach($blocks as $block) {
	$this->Block->render($block);
}
?>

<div class="row">
	<div class="col-md-12">
		<?= $this->fetch('dashboard-top') ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-12">
		<?= $this->fetch('dashboard-left') ?>
	</div>
	<div class="col-lg-6 col-md-12">
		<?= $this->fetch('dashboard-right') ?>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<?= $this->fetch('dashboard-bottom') ?>
	</div>
</div>
