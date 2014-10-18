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
	<div class="col-lg-8 col-md-6 col-xs-12">
		<?= $this->fetch('dashboard-left') ?>
	</div>
	<div class="col-lg-4 col-md-6 col-xs-12">
		<?= $this->fetch('dashboard-right') ?>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<?= $this->fetch('dashboard-bottom') ?>
	</div>
</div>
