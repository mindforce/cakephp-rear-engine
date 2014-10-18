<?php $this->extend('/Admin/Common/form'); ?>

<?php $this->assign('title', __('Cell')); ?>

<dl class="dl-horizontal">
	<dt><?= __('Id') ?></dt>
	<dd>
		<?= h($cell->id) ?>
		&nbsp;
	</dd>
	<dt><?= __('Block') ?></dt>
	<dd>
			<?= $cell->has('block') ? $this->Html->link($cell->block->title, ['controller' => 'Blocks', 'action' => 'view', $cell->block->id]) : '' ?>
			&nbsp;
		</dd>
	<dt><?= __('Parent Id') ?></dt>
	<dd>
		<?= h($cell->parent_id) ?>
		&nbsp;
	</dd>
	<dt><?= __('Title') ?></dt>
	<dd>
		<?= h($cell->title) ?>
		&nbsp;
	</dd>
	<dt><?= __('Slug') ?></dt>
	<dd>
		<?= h($cell->slug) ?>
		&nbsp;
	</dd>
	<dt><?= __('Cell') ?></dt>
	<dd>
		<?= h($cell->cell) ?>
		&nbsp;
	</dd>
	<dt><?= __('Text') ?></dt>
	<dd>
		<?= h($cell->text) ?>
		&nbsp;
	</dd>
	<dt><?= __('State') ?></dt>
	<dd>
		<?= h($cell->state) ?>
		&nbsp;
	</dd>
	<dt><?= __('Lft') ?></dt>
	<dd>
		<?= h($cell->lft) ?>
		&nbsp;
	</dd>
	<dt><?= __('Rght') ?></dt>
	<dd>
		<?= h($cell->rght) ?>
		&nbsp;
	</dd>
	<dt><?= __('Created') ?></dt>
	<dd>
		<?= h($cell->created) ?>
		&nbsp;
	</dd>
	<dt><?= __('Modified') ?></dt>
	<dd>
		<?= h($cell->modified) ?>
		&nbsp;
	</dd>
	<dt><?= __('Params') ?></dt>
	<dd>
		<?= h($cell->params) ?>
		&nbsp;
	</dd>
	<dt><?= __('Visibility') ?></dt>
	<dd>
		<?= h($cell->visibility) ?>
		&nbsp;
	</dd>
	<dt><?= __('Visible On') ?></dt>
	<dd>
		<?= h($cell->visible_on) ?>
		&nbsp;
	</dd>
</dl>

<?php $this->start('actions'); ?>
<div class="btn-group">
	<?= $this->Html->link(__('List Cells'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?> 
	<?= $this->Html->link(__('Edit Cell'), ['action' => 'edit', $cell->id], ['class' => 'btn btn-warning']) ?> 
	<?= $this->Html->link(__('New Cell'), ['action' => 'add'], ['class' => 'btn btn-info']) ?> 
		<?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index'], ['class' => 'btn btn-default']) ?> 
		<?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add'], ['class' => 'btn btn-default']) ?> 
	<?= $this->Html->link(__('Delete Cell'), ['action' => 'delete', $cell->id], ['title' => __('Are you sure you want to delete # {0}?', $cell->id), 'class' => 'btn btn-danger btn-confirmation', 'icon' => 'fa-trash-o']) ?> 
</div>
<?php $this->end(); ?>
