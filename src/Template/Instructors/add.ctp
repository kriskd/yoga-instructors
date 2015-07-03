<div class="instructors form large-10 medium-9 columns">
    <?= $this->Form->create($instructor) ?>
    <?php $this->Form->templates([
        'input' => '<input class="form-control" type={{type}} name={{name}} {{attrs}} >',
        'textarea' => '<textarea class="form-control {{attrs}}>{{value}}</textarea>',
    ]); ?>
    <fieldset>
        <legend><?= __('Add Instructor') ?></legend>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <?= $this->Form->input('first_name'); ?>
            </div>
            <div class="col-sm-6 col-xs-12">
                <?= $this->Form->input('last_name'); ?>
            </div>
        </div>
        <?= $this->Form->input('bio'); ?>
        <?= $this->Element('Form/user'); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
