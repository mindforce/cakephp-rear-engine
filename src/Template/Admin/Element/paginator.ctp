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
?>
<?php if($this->Paginator->counter('{{pages}}') > 1): ?>
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
<?php endif; ?>
