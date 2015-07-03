<div class="studios form large-10 medium-9 columns">
    <?= $this->Form->create($studio) ?>
    <?php $this->Form->templates([
        'input' => '<input class="form-control" type={{type}} name={{name}} {{attrs}} >',
        'select' => '<select class="form-control" name={{name}} {{attrs}}>{{content}}</select>',
    ]); ?>
    <fieldset>
        <legend><?= __('Add Studio') ?></legend>
        <?php
            echo $this->Form->input('name', ['label' => 'Studio Name']);
            echo $this->Form->input('address');
        ?>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <?= $this->Form->input('city'); ?>
            </div>
            <div class="col-sm-2 col-xs-12">
                <?= $this->Form->input('state_id', ['options' => $states, 'empty' => 'Choose One', 'default' => 'WI']); ?>
            </div>
            <div class="col-sm-4 col-xs-12">
                <?= $this->Form->input('postal_code'); ?>
            </div>
        </div>
        <?php echo $this->Element('Form/user'); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
