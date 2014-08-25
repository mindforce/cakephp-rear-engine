<p><?= $this->Paginator->counter(); ?></p>
<ul class="pagination">
<?php
	echo $this->Paginator->prev('< ' . __('previous'));
	echo $this->Paginator->numbers();
	echo $this->Paginator->next(__('next') . ' >');
?>
</ul>
