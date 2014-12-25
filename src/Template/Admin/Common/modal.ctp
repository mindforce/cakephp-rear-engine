<?php
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
//TODO: adopt it for ajax queries
$indexTitle = empty($this->request->params['plugin']) ? __($this->name) : __d($this->request->params['plugin'], $this->name);

?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button data-dismiss="modal" class="close" type="button">×</button>
			<?php
				if ($titleBlock = $this->fetch('title')):
					echo $titleBlock;
				elseif(isset($title_for_layout)):
					echo $this->Html->tag('h3', $title_for_layout);
				else:
					echo $this->Html->tag('h3', __('Data manager'));
				endif;
			?>
		</div>
		<div class="modal-body">
			<?php if ($contentBlock = $this->fetch('content')): ?>
				<?php echo $contentBlock; ?>
			<?php endif; ?>
		</div>
		<div class="modal-footer">
		<?php if ($actionsBlock = $this->fetch('actions')): ?>
				<?php echo $actionsBlock; ?>
		<?php else: ?>
			<?php
			echo $this->Html->tag('button',
				__('Save'),
				array(
					'id' => $modelClass.'ManagerSubmit',
					'name' => 'save',
				    'class' => 'btn btn-primary'    ,
				)
			);
			echo $this->Html->tag('button',
				__('Close'),
				array(
					'id' => $modelClass.'ManagerClose',
					'class' => 'btn btn-link',
					'data-dismiss' => 'modal',
					'aria-hidden' => 'true',
				)
			);
			?>
		<?php endif; ?>
		</div>
	</div>
</div>
