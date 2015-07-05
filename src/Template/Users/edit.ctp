<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user, [
        'context' => [
            'validator' => [
                'Users' => 'userEdit'
            ],
        ]
    ]) ?>
    <?php $this->Form->templates([
        'input' => '<input class="form-control" type={{type}} name={{name}} {{attrs}} >',
        'select' => '<select class="form-control" name={{name}} {{attrs}}>{{content}}</select>',
        'textarea' => '<textarea class="form-control {{attrs}}>{{value}}</textarea>',
    ]); ?>
    <fieldset>
        <legend><?= __('Edit') ?> <?php echo ucfirst($user->type); ?></legend>
        <?php echo $this->Element('Form/'.$user->type); ?>
        <div class="row">
            <div class="col-xs-12">
                <?= $this->Form->input('email'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <?= $this->Form->input('password'); ?>
            </div>
            <div class="col-sm-6 col-xs-12">
                <?= $this->Form->input('password_confirm', ['type' => 'password']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?= $this->Form->input('phone'); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
