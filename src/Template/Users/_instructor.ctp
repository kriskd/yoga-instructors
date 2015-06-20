<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add Instructor') ?></legend>
        <?php
            echo $this->Form->input('instructors.0.first_name');
            echo $this->Form->input('instructors.0.last_name');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('password_confirm', ['type' => 'password']);
            echo $this->Form->input('phone');
            echo $this->Form->input('instructors.0.bio');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
