<script>
	$( document ).ready( function(){
		setTimeout(function () { $('.alert').alert('close'); }, 5000);
	});
</script>
<div class="alert alert-success fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only"><?= __d('sb_admin2', 'Close') ?></span></button>
	<?= h($message) ?>
</div>