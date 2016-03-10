<?php
    $inputOptions = isset($inputOptions) ? $inputOptions : [];
    $formOptions = isset($formOptions) ? $formOptions : [];
    if (empty($formOptions['id'])) {
        $formOptions['id'] = 'search-form';
    }
    if (empty($formOptions['id'])) {
        $formOptions['class'] .= ' form-search form-inline';
    } else {
        $formOptions['class'] = 'form-search form-inline';
    }
?>
<?php if(isset($searchParameters)): ?>
    <!-- Old deprecated way -->
    <?php $searchInputs = $this->Search->inputs($searchParameters, $inputOptions); ?>
    <div class="row" style="margin-bottom:20px;">
        <div class="col-xs-12 col-md-10">
            <?= $this->Form->create(null, $formOptions); ?>
                <?php foreach($searchInputs as $searchInput=>$searchInputOptions):?>
                    <?= $this->Form->input($searchInput, $searchInputOptions)?>
                <?php endforeach; ?>
                <?= $this->Form->button(__('Search'), ['type' => 'submit', 'class' => 'btn btn-primary']); ?>
                <?= $this->Html->link(__('Reset search'), ['action' => $this->request->params['action']], ['class' => 'btn btn-link']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
<?php elseif(isset($prgSearchParameters)): ?>
    <div class="row" style="margin-bottom:20px;">
        <div class="col-xs-12 col-md-10">
            <?= $this->Form->create(null, $formOptions); ?>
                <?php foreach($prgSearchParameters as $inputName=>$inputOptions):?>
                    <?= $this->Form->input($inputName, $inputOptions)?>
                <?php endforeach; ?>
                <?= $this->Form->button(__('Search'), ['type' => 'submit', 'class' => 'btn btn-primary']); ?>
                <?= $this->Html->link(__('Reset search'), ['action' => $this->request->params['action']], ['class' => 'btn btn-link']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
<?php endif; ?>
