<?php
if (!$this->fetch('title')) $this->assign('title', $this->name);
?>

<div class="panel panel-default">
	<?php if ($titleBlock = $this->fetch('title')): ?>
		<div class="panel-heading">
			<?= $titleBlock ?>
		</div>
	<?php endif; ?>
    <div class="panel-body">
	    <?php if ($contentBlock = $this->fetch('content')): ?>
			<?= $contentBlock; ?>
		<?php endif; ?>
    </div>
</div>