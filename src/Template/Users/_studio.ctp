<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add Studio') ?></legend>
        <?php
            echo $this->Form->input('studios.0.name', ['label' => 'Studio Name']);
            echo $this->Form->input('studios.0.address');
            echo $this->Form->input('studios.0.city');
            echo $this->Form->input('studios.0.state_id', ['options' => $states, 'empty' => 'Choose One', 'default' => 'WI']);
            echo $this->Form->input('studios.0.postal_code');
            echo $this->Form->input('studios.0.contact', ['label' => 'Contact Name']);
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('password_confirm', ['type' => 'password']);
            echo $this->Form->input('phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
