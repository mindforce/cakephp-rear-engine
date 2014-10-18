<?php $this->extend('/Admin/Common/form'); ?>

<?php $this->assign('title', __('Add Cell')); ?>

<?php $this->assign('form_create', $this->Form->create($cell)); ?>

<?php
	echo $this->Form->input('block_id', ['options' => $blocks]);
	echo $this->Form->input('parent_id');
	echo $this->Form->input('title');
	echo $this->Form->input('slug');
	echo $this->Form->input('cell');
	echo $this->Form->input('text');
	echo $this->Form->input('state');
	echo $this->Form->input('lft');
	echo $this->Form->input('rght');
	echo $this->Form->input('params');
	echo $this->Form->input('visibility');
	echo $this->Form->input('visible_on');
?>

<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>

<?php $this->assign('form_end', $this->Form->end()); ?>

<?php $this->start('actions'); ?>
<div class="btn-group">
	<?= $this->Html->link(__('List Cells'), ['action' => 'index'], ['class' => 'btn btn-primary']); ?> 
	<?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index'], ['class' => 'btn btn-default']); ?> 
	<?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add'], ['class' => 'btn btn-default']); ?> 
</div>
<?php $this->end(); ?>