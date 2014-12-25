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
<?php $this->extend('/Admin/Common/index'); ?>

<?php $this->assign('title', __('Blocks')); ?>

<table class="table">
	<tr>
		<th><?= $this->Paginator->sort('id') ?></th>
		<th><?= $this->Paginator->sort('title') ?></th>
		<th><?= $this->Paginator->sort('slug') ?></th>
		<th><?= $this->Paginator->sort('created') ?></th>
		<th><?= $this->Paginator->sort('modified') ?></th>
		<th><?= $this->Paginator->sort('admin') ?></th>
		<th><?= $this->Paginator->sort('cell_count') ?></th>
		<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php foreach ($blocks as $block): ?>
	<tr>
		<td><?= h($block->id) ?>&nbsp;</td>
		<td><?= h($block->title) ?>&nbsp;</td>
		<td><?= h($block->slug) ?>&nbsp;</td>
		<td><?= h($block->created) ?>&nbsp;</td>
		<td><?= h($block->modified) ?>&nbsp;</td>
		<td><?= h($block->admin) ?>&nbsp;</td>
		<td><?= h($block->cell_count) ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $block->id], ['class' => 'btn btn-sm btn-primary', 'icon' => 'fa-eye']) ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $block->id], ['class' => 'btn btn-sm btn-warning', 'icon' => 'fa-edit']) ?>
			<?= $this->Html->link(__('Delete'), ['action' => 'delete', $block->id], ['title' => __('Are you sure you want to delete # {0}?', $block->id), 'class' => 'btn btn-sm btn-danger btn-confirmation', 'icon' => 'fa-trash-o']) ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php $this->start('actions'); ?>
<div class="btn-group">
	<?= $this->Html->link(__('New Block'), ['action' => 'add'], ['class' => 'btn btn-primary']); ?>	<?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
	<?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'btn btn-default']) ?>
</div>
<?php $this->end(); ?>
