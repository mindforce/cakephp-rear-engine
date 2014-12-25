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

if (!$this->fetch('title')) $this->assign('title', $this->name);

$indexTitle = empty($this->request->params['plugin']) ? __($this->name) : __d($this->request->params['plugin'], $this->name);

//you can override crumbs addition in view but after crumbs addition you need to set
// $viewCrumbs to true: $this->set('viewCrumbs', true);
if (!isset($viewCrumbs)||($viewCrumbs === false)){
	$this->Html->addCrumb($indexTitle, array('action' => 'index'));
	$this->Html->addCrumb($this->fetch('title'));
}
?>

<div class="<?php echo Inflector::slug(Inflector::underscore($this->name), '-').' '.str_replace('admin_', '', $this->request->params['action']); ?>">
	<?php if($this->fetch('title')||$this->fetch('actions')): ?>
	<div class="row">
	    <?php if ($titleBlock = $this->fetch('title')): ?>
	    <div class="col-lg-7 col-md-6 col-xs-12">
	        <h1 class="page-header pull-left"><?= $titleBlock ?></h1>
        </div>
	    <?php endif; ?>
        <?php if ($actionsBlock = $this->fetch('actions')): ?>
	    <div class="col-lg-5 col-md-6 col-xs-12">
		    <div class="pull-right actions">
		        <?= $actionsBlock; ?>
			</div>
	    </div>
        <?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if ($contentBlock = $this->fetch('content')): ?>
		<?php if($this->fetch('content_header')): ?>
			<div class="panel panel-default">
				<?php if ($this->fetch('content_header')): ?>
					<div class="panel-heading">
						<?php if ($panelTitleBlock = $this->fetch('content_header')): ?>
							<div style="margin-right: 15px;">
								<h5><?= $panelTitleBlock; ?></h5>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<div class="panel-body">
					<?= $contentBlock; ?>
				</div>
			</div>
		<?php else: ?>
			<div class="row">
				<div class="col-xs-12">
					<?php echo $contentBlock; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>

<?php if ($modalBlock = $this->fetch('modal')): ?>
	<?php echo $modalBlock; ?>
<?php endif; ?>
