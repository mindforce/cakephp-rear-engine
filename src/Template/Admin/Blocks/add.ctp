<?php $this->extend('/Admin/Common/form'); ?>

<?php $this->assign('title', __('Add Block')); ?>

<?php $this->assign('form_create', $this->Form->create($block)); ?>

<?php
	echo $this->Form->input('title');
	echo $this->Form->input('slug');
	echo $this->Form->input('admin');
	echo $this->Form->input('cell_count');
?>

<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>

<?php $this->assign('form_end', $this->Form->end()); ?>

<?php $this->start('actions'); ?>
<div class="btn-group">
	<?= $this->Html->link(__('List Blocks'), ['action' => 'index'], ['class' => 'btn btn-primary']); ?> 
	<?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index'], ['class' => 'btn btn-default']); ?> 
	<?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'btn btn-default']); ?> 
</div>
<?php $this->end(); ?>