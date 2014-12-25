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

<?php $this->assign('title', __('Cells')); ?>

<table class="table">
	<tr>
		<th><?= $this->Paginator->sort('id') ?></th>
		<th><?= $this->Paginator->sort('block_id') ?></th>
		<th><?= $this->Paginator->sort('parent_id') ?></th>
		<th><?= $this->Paginator->sort('title') ?></th>
		<th><?= $this->Paginator->sort('slug') ?></th>
		<th><?= $this->Paginator->sort('cell') ?></th>
		<th><?= $this->Paginator->sort('text') ?></th>
		<th><?= $this->Paginator->sort('state') ?></th>
		<th><?= $this->Paginator->sort('lft') ?></th>
		<th><?= $this->Paginator->sort('rght') ?></th>
		<th><?= $this->Paginator->sort('created') ?></th>
		<th><?= $this->Paginator->sort('modified') ?></th>
		<th><?= $this->Paginator->sort('params') ?></th>
		<th><?= $this->Paginator->sort('visibility') ?></th>
		<th><?= $this->Paginator->sort('visible_on') ?></th>
		<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php foreach ($cells as $cell): ?>
	<tr>
		<td><?= h($cell->id) ?>&nbsp;</td>
		<td>
			<?= $cell->has('block') ? $this->Html->link($cell->block->title, ['controller' => 'Blocks', 'action' => 'view', $cell->block->id]) : '' ?>
		</td>
		<td><?= h($cell->parent_id) ?>&nbsp;</td>
		<td><?= h($cell->title) ?>&nbsp;</td>
		<td><?= h($cell->slug) ?>&nbsp;</td>
		<td><?= h($cell->cell) ?>&nbsp;</td>
		<td><?= h($cell->text) ?>&nbsp;</td>
		<td><?= h($cell->state) ?>&nbsp;</td>
		<td><?= h($cell->lft) ?>&nbsp;</td>
		<td><?= h($cell->rght) ?>&nbsp;</td>
		<td><?= h($cell->created) ?>&nbsp;</td>
		<td><?= h($cell->modified) ?>&nbsp;</td>
		<td><?= h($cell->params) ?>&nbsp;</td>
		<td><?= h($cell->visibility) ?>&nbsp;</td>
		<td><?= h($cell->visible_on) ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $cell->id], ['class' => 'btn btn-sm btn-primary', 'icon' => 'fa-eye']) ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $cell->id], ['class' => 'btn btn-sm btn-warning', 'icon' => 'fa-edit']) ?>
			<?= $this->Html->link(__('Delete'), ['action' => 'delete', $cell->id], ['title' => __('Are you sure you want to delete # {0}?', $cell->id), 'class' => 'btn btn-sm btn-danger btn-confirmation', 'icon' => 'fa-trash-o']) ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php $this->start('actions'); ?>
<div class="btn-group">
	<?= $this->Html->link(__('New Cell'), ['action' => 'add'], ['class' => 'btn btn-primary']); ?>	<?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
	<?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add'], ['class' => 'btn btn-default']) ?>
</div>
<?php $this->end(); ?>
