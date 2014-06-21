<?php
use Cake\Core\Configure;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- TODO:Dasboard render should be here -->

<?php if (Configure::read('debug')) :?>
	<?= $this->element('RearEngine.system_info'); ?>
<?php endif; ?>