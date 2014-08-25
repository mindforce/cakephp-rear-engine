<?php
/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) iTeam s.r.o. (http://iteam-pro.com)
 * @link          http://iteam-pro.com RearEngine CakePHP 3 Plugin
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;
use Cake\Utility\Hash;
?>
<div class="posts form">
<?= $this->Form->create('Setting'); ?>
	<?php
	foreach ($settings as $i=>$setting){
		$label = explode('.', $setting->key);
		$section = 'App';
		if (count($label) > 1)
			$section = $label[0];
		unset($label[0]);

		$options = [
			'type' => 'text',
			'label' => Inflector::humanize(implode("_", $label))
		];
		if(is_array($setting->options)){
			$options = Hash::merge($options, $setting->options);
		}

		if (!empty($setting->type)){
			$options['type'] = $setting->type;
			if(($options['type'] == 'checkbox')&&($setting->value == 1)){
				$options['checked'] = 'checked';
				$options['style'] = false;
			} elseif(($options['type'] == 'radio')) {
				$options['style'] = false;
			}
		}
		if(!empty($setting->title)){
			$options['label'] = $setting->title;
			$options['legend'] = true;
		}
		if(!empty($setting->description))
			$options['placeholder'] = $setting->description;

		$options['value'] = $setting->value;
		if(!empty($setting->value))
			$options['value'] = $setting->value;


		$id    = $this->Form->input("Setting.$i.id", ['type'=>'hidden', 'value' => $setting->id]);
		$outputCell = 'RearEngine.Setting';
		if(!empty($setting->cell)) $outputCell = $setting->cell;
		$input = $this->cell($outputCell, ['key' => "Setting.$i.value", 'options' => $options]);
		$inputs[$section][] = $id.$input;
	}
	?>
	<?= $this->Html->link('', '#', ['id' => 'settings_top'])?>
	<fieldset>
		<legend><?= __d('rear_engine', 'Settings'); ?></legend>

		<nav class="admin-menu">
			<ul>
			<?php
			foreach ($inputs as $scope=>$fields){
				echo $this->Html->tag('li',
					$this->Html->link($scope, ['action' => 'index', '#' => Inflector::slug($scope)])
				);
			}
			?>
			</ul>
		</nav>
		<?php
		foreach ($inputs as $scope=>$fields){
		    echo $this->Html->tag('h3',
		        $this->Html->link($scope, '#', ['id' => Inflector::slug($scope)])
		        .$this->Html->link(
			        __d('rear_engine', '#Top'),
			        ['action' => 'index', '#' => 'settings_top'],
			        ['style' => 'float:right;font-size:12px;']
		        )
		    );
		    echo $this->Html->div('', implode("\n", $fields));
		}
		echo $this->Form->submit(__d('rear_engine', 'Save settings'), array(
			'name' => 'save',
		));
		?>
	</fieldset>
<?= $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__d('rear_engine', 'Dashboard'), ['controller' => 'Dashboards', 'action' => 'index']); ?></li>
	</ul>
</div>
