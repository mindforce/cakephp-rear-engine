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
}
?>

<div class="<?= Inflector::slug(Inflector::underscore($this->name), '-').' '.str_replace('admin_', '', $this->request->params['action']); ?>">
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
	    <div class="col-lg-12">
            <?php if($this->fetch('content_header')): ?>
		        <div class="panel panel-default">
			        <?php if ($this->fetch('content_header')||$this->fetch('search')||isset($searchParameters)): ?>
			        <div class="panel-heading">
				        <?php if ($panelTitleBlock = $this->fetch('content_header')): ?>
						    <?= $panelTitleBlock; ?>
				        <?php endif; ?>
				        <?php if ($searchBlock = $this->fetch('search')): ?>
					        <div class="row pull-left">
					        	<div class="col-lg-12">
					        		<?= $searchBlock; ?>
					        	</div>
					        </div>
						<?php else: ?>
							<?= $this->element('RearEngine.search') ?>
						<?php endif; ?>
				        <div class="clearfix"></div>
	                </div>
	                <?php endif; ?>
			        <div class="panel-body">
				        <?php if ($formCreateBlock = $this->fetch('form_create')): ?>
	                        <?= $formCreateBlock; ?>
	                    <?php endif; ?>
						<?php if ($contentBlock = $this->fetch('content')): ?>
							<?= $contentBlock; ?>
						<?php endif; ?>
						<?php if ($formEndBlock = $this->fetch('form_end')): ?>
							<?= $formEndBlock; ?>
						<?php endif; ?>

				        <div class="row">
			                <div class="col-lg-12">
			                    <?php if ($pagingBlock = $this->fetch('paging')): ?>
			                        <?= $pagingBlock; ?>
			                    <?php else: ?>
			                        <?= $this->element('RearEngine.paginator'); ?>
			                    <?php endif; ?>
			                </div>
			            </div>
					</div>
				</div>
			<?php else: ?>
	            <?php if ($searchBlock = $this->fetch('search')): ?>
			        <div class="pull-left" style="margin-bottom:20px;">
						<div class="col-lg-12">
		                	<?= $searchBlock; ?>
						</div>
		        	</div>
				<?php else: ?>
					<?= $this->element('RearEngine.search') ?>
				<?php endif; ?>


	            <?php if ($formCreateBlock = $this->fetch('form_create')): ?>
                    <?= $formCreateBlock; ?>
                <?php endif; ?>
				<?php if ($contentBlock = $this->fetch('content')): ?>
					<?= $contentBlock; ?>
				<?php endif; ?>
	            <?php if ($formEndBlock = $this->fetch('form_end')): ?>
                    <?= $formEndBlock; ?>
                <?php endif; ?>

	            <div class="row">
	                <div class="col-lg-12">
	                    <?php if ($pagingBlock = $this->fetch('paging')): ?>
	                        <?= $pagingBlock; ?>
	                    <?php else: ?>
	                        <?= $this->element('RearEngine.paginator'); ?>
	                    <?php endif; ?>
	                </div>
	            </div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php if ($modalBlock = $this->fetch('modal')): ?>
	<?= $modalBlock; ?>
<?php endif; ?>
