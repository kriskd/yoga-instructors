<div class="instructors form large-10 medium-9 columns">
    <?= $this->Form->create($instructor) ?>
    <?php $this->Form->templates([
        'input' => '<input class="form-control" type={{type}} name={{name}} {{attrs}} >',
        'textarea' => '<textarea class="form-control {{attrs}}>{{value}}</textarea>',
    ]); ?>
    <fieldset>
        <legend><?= __('Add Instructor') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('bio');
            echo $this->Form->input('user.email');
            echo $this->Form->input('user.password');
            echo $this->Form->input('user.password_confirm', ['type' => 'password']);
            echo $this->Form->input('user.phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
