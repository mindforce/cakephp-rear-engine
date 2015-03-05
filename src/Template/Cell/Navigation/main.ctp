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
<nav id="sidebar-wrapper" class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm">
    <?= $this->AdminMenu->render($menu, 0, ['class' => "nav nav-sidebar", 'id' => 'side-menu']); ?>
</nav>
<!-- /.navbar-static-side -->
