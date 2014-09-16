<div class="row">
	<div class="col-lg-2 col-md-3 col-xs-4">
		<ul class="pagination pull-left">
			<li class="prev disabled">
				<span><?= $this->Paginator->counter(); ?></span>
			</li>
		</ul>
	</div>
	<div class="col-lg-10 col-md-9 col-xs-8">
		<ul class="pagination pull-right">
		<?php
			echo $this->Paginator->prev('< ' . __d('sb_admin2','previous'));
			echo $this->Paginator->numbers();
			echo $this->Paginator->next(__d('sb_admin2', 'next') . ' >');
		?>
		</ul>
	</div>
</div>
