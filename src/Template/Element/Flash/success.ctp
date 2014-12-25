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
<script>
	$( document ).ready( function(){
		setTimeout(function () { $('.alert').alert('close'); }, 5000);
	});
</script>
<div class="alert alert-success fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only"><?= __d('sb_admin2', 'Close') ?></span></button>
	<?= h($message) ?>
</div>
