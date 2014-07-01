<?php
/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) iTeam s.r.o. (http://iteam-pro.com)
 * @link          http://iteam-pro.com RearEngine CakePHP 3 Plugin
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Please Sign In</h3>
        </div>
        <div class="panel-body">
	        <?= $this->Form->create(); ?>
                <fieldset>
					<?= $this->Form->input('email', array(
							'label' => false,
							'placeholder' => __d('rear_engine', 'E-email'),
						)).$this->Form->input('password', array(
							'type' => 'password',
							'label' => false,
							'placeholder' => __d('rear_engine', 'Password'),
						)).$this->Form->input('remember', array(
							'type' => 'checkbox',
							'label' => __d('rear_engine', 'Remember Me'),
						));
					?>
                    <!-- Change this to a button or input when using this as a form -->
	                <?= $this->Form->button(__d('rear_engine', 'Login'), [
		                    'class' => 'btn-lg btn-success btn-block'
	                    ]);
	                ?>
                </fieldset>
	        <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
