<?php
/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) iTeam s.r.o. (http://iteam-pro.com)
 * @link          http://iteam-pro.com SbAdmin2 CakePHP 3 Theme
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

	<div class="row">
		<div class="col-xs-12">
			<?php if ($this->fetch('form_create')&&($this->fetch('form_end'))): ?>
				<?php if ($formCreateBlock = $this->fetch('form_create')): ?>
					<?= $formCreateBlock; ?>
				<?php endif; ?>
				<div class="panel panel-default">
				<?php if ($contentTitleBlock = $this->fetch('content_header')): ?>
					<div class="panel-heading">
						<?= $contentTitleBlock; ?>
					</div>
				<?php endif; ?>
					<div class="panel-body">
						<?php if ($contentBlock = $this->fetch('content')): ?>
							<?= $contentBlock; ?>
						<?php endif; ?>
						<div class="clearfix"></div>
						<?php if ($formActionsBlock = $this->fetch('form_actions')): ?>
							<?= $formActionsBlock; ?>
						<?php else: ?>
							<?= ''; //TODO: unified actions buttons group here ?>
						<?php endif; ?>
					</div>
				</div>

				<?php if ($formEndBlock = $this->fetch('formEnd')): ?>
					<?= $formEndBlock; ?>
				<?php endif; ?>
			<?php else: ?>
				<?php if ($contentBlock = $this->fetch('content')): ?>
					<?= $contentBlock; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php if ($modalBlock = $this->fetch('modal')): ?>
	<?= $modalBlock; ?>
<?php endif; ?>
