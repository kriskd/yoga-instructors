<div class="studios form large-10 medium-9 columns">
    <?= $this->Form->create($studio) ?>
    <fieldset>
        <legend><?= __('Add Studio') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('address');
            echo $this->Form->input('city');
            echo $this->Form->input('state_id', ['options' => $states, 'empty' => 'Choose One', 'default' => 'WI']);
            echo $this->Form->input('postal_code');
            echo $this->Form->input('contact');
            echo $this->Form->input('user.email');
            echo $this->Form->input('user.password');
            echo $this->Form->input('user.password_confirm', ['type' => 'password']);
            echo $this->Form->input('user.phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
