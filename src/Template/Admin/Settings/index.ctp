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

use Cake\Utility\Inflector;
use Cake\Utility\Hash;
?>
<?php $this->extend('/Admin/Common/form'); ?>

<?php
$this->assign('title', __d('rear_engine', 'Settings'));

$this->start('content_title');
	echo $this->Html->tag('span', $this->Html->tag('i', '', [ 'class' => 'fa fa-wrench']), ['class' => 'icon']);
$this->end();
?>

<?= $this->Form->create('Setting'); ?>
<?php
foreach ($settings as $i => $setting){
	$label = explode('.', $setting->path);
	$section = 'App';
	if (count($label) > 1)
		$section = $label[0];
	unset($label[0]);

	$options = [
		'type' => 'text',
		'label' => Inflector::humanize(implode("_", $label))
	];
	if(is_array($setting->options)){
		$options = Hash::merge($options, (array)$setting->options);
	}

	if(!empty($setting->title))
		$options['label'] = $setting->title;
	if(!empty($setting->description))
		$options['help'] = $setting->description;

	$options['value'] = $setting->value;
	if(!empty($setting->value))
		$options['value'] = $setting->value;


	$id    = $this->Form->input("Setting.$i.id", ['type'=>'hidden', 'value' => $setting->id]);
	$outputCell = 'RearEngine.Setting';
    if(!empty($setting->cell)) $outputCell = $setting->cell;
	$input = $this->cell($outputCell, ['path' => "Setting.$i.value", 'options' => $options]);

	$inputs[$section][] = $id.$input;
}

$i = 0;
$tabs = $tabsContent = [];
foreach ($inputs as $scope=>$fields){
    $tabOptions = [];
    if($i == 0) $tabOptions['class'] = 'active';
    $tabs[] = $this->Html->tag('li',
        $this->Html->link($scope,
            '#'.$scope,
            ['role' => 'tab', 'data-toggle' => 'tab']
        ),
        $tabOptions
    );
    $fields = array_chunk($fields, ceil(count($fields)/2));
    foreach($fields as $j=>$part){
        $fields[$j] = $this->Html->div('col-md-6 col-xs-12', implode("\n", $part));
    }
    $tabsContent[] = $this->Html->div('tab-pane fade'.(($i==0) ? ' in active' : ''),
        $this->Html->div('row', $this->Html->tag('fieldset', implode("\n", $fields))),
        ['id' => $scope]
    );
    $i++;
}

echo $this->Html->tag('ul', implode("\n", $tabs), ['class' => 'nav nav-tabs', 'role' => 'tablist']);
echo $this->Html->div('tab-content', implode("\n", $tabsContent));
?>

<div class="btn-group pull-right form-actions">
	<?php
		echo $this->Form->button(__d('rear_engine', 'Save settings'), [
            'type' => 'submit',
            'name' => 'save',
		    'div' => false,
		    'class' => 'btn btn-sm btn-success',
        ]);
		echo $this->Html->link(__d('rear_engine', 'Cancel'),
			['controller'=>'dashboards', 'action' => 'index'],
			['class' => 'btn btn-sm btn-default']
		);
	?>
</div>
<?= $this->Form->end(); ?>

<?php $this->start('actions'); ?>
<div class="btn-group">
	<?php echo $this->Html->link(__d('rear_engine', 'Dashboard'), ['controller'=>'Dashboards', 'action' => 'index'], ['class' => 'btn btn-primary']); ?>
</div>
<?php $this->end(); ?>
