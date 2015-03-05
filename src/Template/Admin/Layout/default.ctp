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
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset(); ?>
    <title>
        <?= $this->fetch('title'); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
    ?>
        <!-- Core CSS - Include with every page -->
    <?php
        echo $this->Html->css([
            'bootstrap.css',
            'bootstrap-theme.css',
            'font-awesome.css',
            'Garderobe/BootstrapKit.jasny-bootstrap/jasny-bootstrap.css',
            'RearEngine.metisMenu/metisMenu.css',
            'RearEngine.admin.css'
        ]);
        echo $this->fetch('css');
    ?>
    <!-- Core Scripts - Include with every page -->
    <?php
        echo $this->Html->script([
            'jquery.js',
            'bootstrap.js',
            'Garderobe/BootstrapKit.jasny-bootstrap/jasny-bootstrap.js',
            'RearEngine.metisMenu/metisMenu.js',
            'RearEngine.admin.js'
        ]);
        echo $this->fetch('script');
    ?>
</head>
<body>
    <div id="wrapper">
        <?= $this->cell('RearEngine.Navigation', ['block' => 'main']); ?>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" id="sidebar-toggle" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
                        <span class="sr-only"><?= __d('rear_engine', 'Toggle navigation') ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div id="breadcrumb" class="navbar-breadcrumb">
                        <?= $this->Html->getCrumbList(['class' => 'nav navbar-nav'], __d('rear_engine', 'RearEngine Admin')) ?>
                    </div>
                </div>
                <?= $this->cell('RearEngine.Navigation', ['block' => 'top']); ?>
            </div>
        </nav>
        <div id="page-wrapper">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <div id="footer">
            <div class="pull-right">
            <?= $this->Html->link(
                    $this->Html->image('cake.power.gif', array('alt' => 'test', 'border' => '0')),
                    'http://www.cakephp.org/',
                    array('target' => '_blank', 'escape' => false)
                )
            ?>
            </div>
        </div>
    </div>
</body>
</html>
