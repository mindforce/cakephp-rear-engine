<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Forms</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic Form Elements
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?= $this->Form->create(); ?>
	                        <?= $this->Form->input('text', array(
									'label' => __d('rear_engine', 'Text Input'),
									'help' => __d('rear_engine', 'Example block-level help text here.'),
								)).$this->Form->input('placeholder_text', array(
			                        'label' => __d('rear_engine', 'Text Input with Placeholder'),
			                        'placeholder' => __d('rear_engine', 'Enter text'),
		                        )).$this->Form->input('static', array(
			                        'type' => 'static',
	                                'label' => __d('rear_engine', 'Static Control'),
	                                'value' => 'email@example.com',
		                        )).$this->Form->input('file', array(
			                        'type' => 'file',
	                                'label' => __d('rear_engine', 'File input'),
		                        )).$this->Form->input('textarea', array(
			                        'type' => 'textarea',
	                                'label' => __d('rear_engine', 'Text area'),
			                        'rows' => 3
		                        )).$this->Form->input('checkbox_group', array(
			                        //TODO: maybe Checkbox Widget redesign needed
			                        'type' => 'select',
	                                'label' => __d('rear_engine', 'Checkbox'),
			                        'multiple' => 'checkbox',
			                        'options' => [
				                        1 => __d('rear_engine', 'Checkbox 1'),
				                        2 => __d('rear_engine', 'Checkbox 2'),
				                        3 => __d('rear_engine', 'Checkbox 3')
			                        ]
								));
	                        ?>
                            <div class="form-group">
                                <label>Inline Checkboxes</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox">1
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox">2
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox">3
                                </label>
                            </div>
							<?= $this->Form->input('radio', array(
									'type' => 'radio',
									'label' => __d('rear_engine', 'Radio Buttons'),
									'options' => [
										1 => __d('rear_engine', 'Radio 1'),
										2 => __d('rear_engine', 'Radio 2'),
										3 => __d('rear_engine', 'Radio 3')
									]
								));
							?>

                            <div class="form-group">
                                <label>Radio Buttons</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Inline Radio Buttons</label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                </label>
                            </div>
		                    <?= $this->Form->input('select', array(
	                                'type' => 'select',
	                                'label' => __d('rear_engine', 'Selects'),
	                                'options' => [1, 2, 3, 4, 5]
	                            )).$this->Form->input('multiple_select', array(
                                    'type' => 'select',
			                        'multiple' => true,
                                    'label' => __d('rear_engine', 'Multiple Selects'),
                                    'options' => [1, 2, 3, 4, 5]
                                ));
	                        ?>
	                        <?= $this->Form->button(__d('rear_engine', 'Submit Button'), ['type' => 'submit', 'class' => 'btn-default']); ?>
		                    <?= $this->Form->button(__d('rear_engine', 'Reset Button'), ['type' => 'reset', 'class' => 'btn-default']); ?>
                        <?= $this->Form->end(); ?>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <h1>Disabled Form States</h1>
                        <?= $this->Form->create(); ?>
                            <fieldset disabled>
	                            <?= $this->Form->input('disabled_input', array(
			                            'disabled' => true,
		                                'placeholder' =>  __d('rear_engine', 'Disabled input'),
                                        'label' => __d('rear_engine', 'Disabled input'),
                                    )).$this->Form->input('disabled_select', array(
										'type' => 'select',
		                                'disabled' => true,
										'label' => __d('rear_engine', 'Disabled select menu'),
										'options' => ['' => __d('rear_engine', 'Disabled select')]
	                                )).$this->Form->input('disabled_checkbox', array(
										'type' => 'checkbox',
										'disabled' => true,
										'label' => __d('rear_engine', ''),
                                    ));
                                ?>
                            </fieldset>
		                    <?= $this->Form->button(__d('rear_engine', 'Disabled Button'),
			                        ['disabled'=> true, 'type' => 'submit', 'class' => 'btn-primary']
		                        );
		                    ?>
                        <?= $this->Form->end(); ?>
                        <h1>Form Validation States</h1>
                        <?= $this->Form->create(); ?>
                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">Input with success</label>
                                <input type="text" class="form-control" id="inputSuccess">
                            </div>
                            <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">Input with warning</label>
                                <input type="text" class="form-control" id="inputWarning">
                            </div>
                            <div class="form-group has-error">
                                <label class="control-label" for="inputError">Input with error</label>
                                <input type="text" class="form-control" id="inputError">
                            </div>
                        <?= $this->Form->end(); ?>
                        <h1>Input Groups</h1>
                        <?= $this->Form->create(); ?>
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-eur"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Font Awesome Icon">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>
                            <div class="form-group input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        <?= $this->Form->end(); ?>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
