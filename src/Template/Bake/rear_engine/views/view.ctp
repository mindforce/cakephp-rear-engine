<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         1.2.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;
?>
<?= "<?php \$this->extend('/Admin/Common/form'); ?>\n"; ?>

<?= "<?php \$this->assign('title', __('{$singularHumanName}')); ?>\n"; ?>

<dl class="dl-horizontal">
<?php
foreach ($fields as $field) {
	$isKey = false;
	if (!empty($associations['BelongsTo'])) {
		foreach ($associations['BelongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\t<dt><?= __('" . Inflector::humanize(Inflector::underscore($details['property'])) . "') ?></dt>\n";
				echo "\t<dd>\n\t\t\t<?= \${$singularVar}->has('{$details['property']}') ? \$this->Html->link(\${$singularVar}->{$details['property']}->{$details['displayField']}, ['controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}->{$details['property']}->{$details['primaryKey'][0]}]) : '' ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\t<dt><?= __('" . Inflector::humanize($field) . "') ?></dt>\n";
		echo "\t<dd>\n\t\t<?= h(\${$singularVar}->{$field}) ?>\n\t\t&nbsp;\n\t</dd>\n";
	}
}
?>
</dl>

<?= "<?php \$this->start('actions'); ?>\n"; ?>
<div class="btn-group">
<?php
	$pk = "\${$singularVar}->{$primaryKey[0]}";

	echo "\t<?= \$this->Html->link(__('List " . $pluralHumanName . "'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?> \n";
	echo "\t<?= \$this->Html->link(__('Edit " . $singularHumanName ."'), ['action' => 'edit', {$pk}], ['class' => 'btn btn-warning']) ?> \n";
	echo "\t<?= \$this->Html->link(__('New " . $singularHumanName . "'), ['action' => 'add'], ['class' => 'btn btn-info']) ?> \n";

	$done = [];
	foreach ($associations as $type => $data) {
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
				echo "\t\t<?= \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), ['controller' => '{$details['controller']}', 'action' => 'index'], ['class' => 'btn btn-default']) ?> \n";
				echo "\t\t<?= \$this->Html->link(__('New " . Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) . "'), ['controller' => '{$details['controller']}', 'action' => 'add'], ['class' => 'btn btn-default']) ?> \n";
				$done[] = $details['controller'];
			}
		}
	}
	echo "\t<?= \$this->Html->link(__('Delete " . $singularHumanName . "'), ['action' => 'delete', {$pk}], ['title' => __('Are you sure you want to delete # {0}?', {$pk}), 'class' => 'btn btn-danger btn-confirmation', 'icon' => 'fa-trash-o']) ?> \n";
?>
</div>
<?= "<?php \$this->end(); ?>"; ?>

<?php
if (!empty($associations['HasOne'])) :
	foreach ($associations['HasOne'] as $alias => $details): ?>
	<div class="related">
		<h3><?= "<?= __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
	<?= "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
		<dl class="dl-horizontal">
	<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<dt><?= __('" . Inflector::humanize($field) . "'); ?></dt>\n";
				echo "\t\t<dd>\n\t<?= h(\${$singularVar}->{$details['property']}->{$field}) ?>\n&nbsp;</dd>\n";
			}
	?>
		</dl>
	<?= "<?php endif; ?>\n"; ?>
		<div class="actions">
			<?= "<?= \$this->Html->link(__('Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), ['controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}->{$details['property']}->{$details['primaryKey'][0]}], ['class' => 'btn btn-warning']); ?>\n"; ?>
		</div>
	</div>
	<?php
	endforeach;
endif;

if (empty($associations['HasMany'])) {
	$associations['HasMany'] = [];
}
if (empty($associations['BelongsToMany'])) {
	$associations['BelongsToMany'] = [];
}

$relations = array_merge($associations['HasMany'], $associations['BelongsToMany']);
foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralHumanName = Inflector::humanize($details['controller']);
	?>
<div class="related">
	<h3><?= "<?= __('Related " . $otherPluralHumanName . "') ?>"; ?></h3>
	<?= "<?php if (!empty(\${$singularVar}->{$details['property']})): ?>\n"; ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t\t<th><?= __('" . Inflector::humanize($field) . "') ?></th>\n";
			}
?>
			<th class="actions"><?= "<?= __('Actions') ?>"; ?></th>
		</tr>
<?php
echo "\t\t<?php foreach (\${$singularVar}->{$details['property']} as \${$otherSingularVar}): ?>\n";
		echo "\t\t<tr>\n";
			foreach ($details['fields'] as $field) {
				echo "\t\t\t<td><?= h(\${$otherSingularVar}->{$field}) ?></td>\n";
			}

			$otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}";

			echo "\t\t\t<td class=\"actions\">\n";
			echo "\t\t\t\t<div class=\"btn-group btn-group-sm\">\n";
			echo "\t\t\t\t\t<?= \$this->Html->link(__('View'), ['controller' => '{$details['controller']}', 'action' => 'view', {$otherPk}], ['class' => 'btn btn-primary', 'icon' => 'fa-eye']); ?>\n";
			echo "\t\t\t\t\t<?= \$this->Html->link(__('Edit'), ['controller' => '{$details['controller']}', 'action' => 'edit', {$otherPk}], ['class' => 'btn btn-warning', 'icon' => 'fa-edit']); ?>\n";
			echo "\t\t\t\t\t<?= \$this->Form->postLink(__('Delete'), ['controller' => '{$details['controller']}', 'action' => 'delete', {$otherPk}], ['confirm' => __('Are you sure you want to delete # %s?', {$otherPk}), 'class' => 'btn btn-danger', 'icon' => 'fa-trash-o']); ?>\n";
			echo "\t\t\t\t</div>\n";
			echo "\t\t\t</td>\n";
		echo "\t\t</tr>\n";

echo "\t\t<?php endforeach; ?>\n";
?>
	</table>
<?= "\t<?php endif; ?>\n"; ?>
	<div class="actions">
		<?= "<?= \$this->Html->link(__('New " . Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) . "'), ['controller' => '{$details['controller']}', 'action' => 'add'], ['class' => 'btn btn-info']); ?>"; ?>
	</div>
</div>
<?php endforeach; ?>
