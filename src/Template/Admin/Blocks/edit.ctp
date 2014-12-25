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

<?php $this->assign('title', __('Edit Block')); ?>

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
	<?= $this->Html->link(__('Delete'), ['action' => 'delete', $block->id], ['title' => __('Are you sure you want to delete # {0}?', $block->id), 'class' => 'btn btn-danger btn-confirmation', 'icon' => 'fa-trash-o']); ?>
</div>
<?php $this->end(); ?>
