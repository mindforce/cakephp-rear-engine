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

<?= sprintf("<?php \$this->assign('title', __('%s %s')); ?>\n", Inflector::humanize($action), $singularHumanName); ?>

<?= "<?php \$this->assign('form_create', \$this->Form->create(\${$singularVar})); ?>\n"; ?>

<?php
	echo "<?php\n";
	foreach ($fields as $field) {
		if (in_array($field, $primaryKey)) {
			continue;
		}
		if (isset($keyFields[$field])) {
			echo "\techo \$this->Form->input('{$field}', ['options' => \${$keyFields[$field]}]);\n";
			continue;
		}
		if (!in_array($field, ['created', 'modified', 'updated'])) {
			echo "\techo \$this->Form->input('{$field}');\n";
		}
	}
	if (!empty($associations['BelongsToMany'])) {
		foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
			echo "\techo \$this->Form->input('{$assocData['property']}._ids', ['options' => \${$assocData['variable']}]);\n";
		}
	}
	echo "?>\n";
?>

<?= "<?= \$this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>\n"; ?>

<?= "<?php \$this->assign('form_end', \$this->Form->end()); ?>\n"; ?>

<?= "<?php \$this->start('actions'); ?>\n"; ?>
<div class="btn-group">
	<?= "<?= \$this->Html->link(__('List " . $pluralHumanName . "'), ['action' => 'index'], ['class' => 'btn btn-primary']); ?> \n"; ?>
<?php
	$done = [];
	foreach ($associations as $type => $data) {
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
				echo "\t<?= \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), ['controller' => '{$details['controller']}', 'action' => 'index'], ['class' => 'btn btn-default']); ?> \n";
				echo "\t<?= \$this->Html->link(__('New " . Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) . "'), ['controller' => '{$details['controller']}', 'action' => 'add'], ['class' => 'btn btn-default']); ?> \n";
				$done[] = $details['controller'];
			}
		}
	}
?>
<?php if (strpos($action, 'add') === false): ?>
	<?= "<?= \$this->Html->link(__('Delete'), ['action' => 'delete', \${$singularVar}->{$primaryKey[0]}], ['title' => __('Are you sure you want to delete # {0}?', \${$singularVar}->{$primaryKey[0]}), 'class' => 'btn btn-danger btn-confirmation', 'icon' => 'fa-trash-o']); ?> \n"; ?>
<?php endif; ?>
</div>
<?= "<?php \$this->end(); ?>"; ?>
