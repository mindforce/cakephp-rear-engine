<?php $this->extend('/Admin/Common/form'); ?>

<?php $this->assign('title', __('Block')); ?>

<dl class="dl-horizontal">
	<dt><?= __('Id') ?></dt>
	<dd>
		<?= h($block->id) ?>
		&nbsp;
	</dd>
	<dt><?= __('Title') ?></dt>
	<dd>
		<?= h($block->title) ?>
		&nbsp;
	</dd>
	<dt><?= __('Slug') ?></dt>
	<dd>
		<?= h($block->slug) ?>
		&nbsp;
	</dd>
	<dt><?= __('Created') ?></dt>
	<dd>
		<?= h($block->created) ?>
		&nbsp;
	</dd>
	<dt><?= __('Modified') ?></dt>
	<dd>
		<?= h($block->modified) ?>
		&nbsp;
	</dd>
	<dt><?= __('Admin') ?></dt>
	<dd>
		<?= h($block->admin) ?>
		&nbsp;
	</dd>
	<dt><?= __('Cell Count') ?></dt>
	<dd>
		<?= h($block->cell_count) ?>
		&nbsp;
	</dd>
</dl>

<?php $this->start('actions'); ?>
<div class="btn-group">
	<?= $this->Html->link(__('List Blocks'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?> 
	<?= $this->Html->link(__('Edit Block'), ['action' => 'edit', $block->id], ['class' => 'btn btn-warning']) ?> 
	<?= $this->Html->link(__('New Block'), ['action' => 'add'], ['class' => 'btn btn-info']) ?> 
		<?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index'], ['class' => 'btn btn-default']) ?> 
		<?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'btn btn-default']) ?> 
	<?= $this->Html->link(__('Delete Block'), ['action' => 'delete', $block->id], ['title' => __('Are you sure you want to delete # {0}?', $block->id), 'class' => 'btn btn-danger btn-confirmation', 'icon' => 'fa-trash-o']) ?> 
</div>
<?php $this->end(); ?>
<div class="related">
	<h3><?= __('Related Cells') ?></h3>
	<?php if (!empty($block->cells)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Block Id') ?></th>
			<th><?= __('Parent Id') ?></th>
			<th><?= __('Title') ?></th>
			<th><?= __('Slug') ?></th>
			<th><?= __('Cell') ?></th>
			<th><?= __('Text') ?></th>
			<th><?= __('State') ?></th>
			<th><?= __('Lft') ?></th>
			<th><?= __('Rght') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Params') ?></th>
			<th><?= __('Visibility') ?></th>
			<th><?= __('Visible On') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($block->cells as $cells): ?>
		<tr>
			<td><?= h($cells->id) ?></td>
			<td><?= h($cells->block_id) ?></td>
			<td><?= h($cells->parent_id) ?></td>
			<td><?= h($cells->title) ?></td>
			<td><?= h($cells->slug) ?></td>
			<td><?= h($cells->cell) ?></td>
			<td><?= h($cells->text) ?></td>
			<td><?= h($cells->state) ?></td>
			<td><?= h($cells->lft) ?></td>
			<td><?= h($cells->rght) ?></td>
			<td><?= h($cells->created) ?></td>
			<td><?= h($cells->modified) ?></td>
			<td><?= h($cells->params) ?></td>
			<td><?= h($cells->visibility) ?></td>
			<td><?= h($cells->visible_on) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Cells', 'action' => 'view', $cells->id], ['class' => 'btn btn-sm btn-primary', 'icon' => 'fa-eye']); ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Cells', 'action' => 'edit', $cells->id], ['class' => 'btn btn-sm btn-warning', 'icon' => 'fa-edit']); ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Cells', 'action' => 'delete', $cells->id], ['confirm' => __('Are you sure you want to delete # %s?', $cells->id), 'class' => 'btn btn-sm btn-danger', 'icon' => 'fa-trash-o']); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'btn btn-info']); ?>	</div>
</div>
