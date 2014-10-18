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
<?= "<?php \$this->extend('/Admin/Common/index'); ?>\n"; ?>

<?= "<?php \$this->assign('title', __('{$pluralHumanName}')); ?>\n"; ?>

<table class="table">
	<tr>
	<?php foreach ($fields as $field): ?>
	<th><?= "<?= \$this->Paginator->sort('{$field}') ?>"; ?></th>
	<?php endforeach; ?>
	<th class="actions"><?= "<?= __('Actions') ?>"; ?></th>
	</tr>
	<?php
	echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['BelongsTo'])) {
				foreach ($associations['BelongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?= \${$singularVar}->has('{$details['property']}') ? \$this->Html->link(\${$singularVar}->{$details['property']}->{$details['displayField']}, ['controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}->{$details['property']}->{$details['primaryKey'][0]}]) : '' ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<td><?= h(\${$singularVar}->{$field}) ?>&nbsp;</td>\n";
			}
		}

		$pk = "\${$singularVar}->{$primaryKey[0]}";

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<div class=\"btn-group btn-group-sm\">\n";
		echo "\t\t\t\t<?= \$this->Html->link(__('View'), ['action' => 'view', {$pk}], ['class' => 'btn btn-primary', 'icon' => 'fa-eye']) ?>\n";
		echo "\t\t\t\t<?= \$this->Html->link(__('Edit'), ['action' => 'edit', {$pk}], ['class' => 'btn btn-warning', 'icon' => 'fa-edit']) ?>\n";
		echo "\t\t\t\t<?= \$this->Html->link(__('Delete'), ['action' => 'delete', {$pk}], ['title' => __('Are you sure you want to delete # {0}?', {$pk}), 'class' => 'btn btn-danger btn-confirmation', 'icon' => 'fa-trash-o']) ?>\n";
		echo "\t\t\t</div>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "\t<?php endforeach; ?>\n";
	?>
</table>

<?= "<?php \$this->start('actions'); ?>\n"; ?>
<div class="btn-group">
	<?= "<?= \$this->Html->link(__('New " . $singularHumanName . "'), ['action' => 'add'], ['class' => 'btn btn-primary']); ?>"; ?>
<?php
	$done = [];
	foreach ($associations as $type => $data) {
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
				echo "\t<?= \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), ['controller' => '{$details['controller']}', 'action' => 'index'], ['class' => 'btn btn-default']) ?> \n";
				echo "\t<?= \$this->Html->link(__('New " . Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) . "'), ['controller' => '{$details['controller']}', 'action' => 'add'], ['class' => 'btn btn-default']) ?> \n";
				$done[] = $details['controller'];
			}
		}
	}
?>
</div>
<?= "<?php \$this->end(); ?>"; ?>
