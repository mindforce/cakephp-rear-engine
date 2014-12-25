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
