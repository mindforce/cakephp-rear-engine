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
}
?>

<div class="<?php echo Inflector::slug(Inflector::underscore($this->name), '-').' '.str_replace('admin_', '', $this->request->params['action']); ?>">
	<?php if ($titleBlock = $this->fetch('title')): ?>
	    <h2>
			<?= $titleBlock ?>
			<?php if ($panelTitleBlock = $this->fetch('content_header')): ?>
				<small><?= $panelTitleBlock ?></small>
			<?php endif; ?>
	    </h2>
	<?php endif; ?>
	<?php if ($searchBlock = $this->fetch('search')): ?>
	    <div class="search">
			<?= $searchBlock; ?>
	    </div>
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

	<?php if ($pagingBlock = $this->fetch('paging')): ?>
		<?php echo $pagingBlock; ?>
	<?php else: ?>
		<?php echo $this->element('RearEngine.../Admin/Element/paginator'); ?>
	<?php endif; ?>
</div>

<?php if ($actionsBlock = $this->fetch('actions')): ?>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<?= $actionsBlock; ?>
</div>
<?php endif; ?>

<?php if ($modalBlock = $this->fetch('modal')): ?>
	<?= $modalBlock; ?>
<?php endif; ?>
