<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Instructors'), ['controller' => 'Instructors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Instructor'), ['controller' => 'Instructors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Studios'), ['controller' => 'Studios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Studio'), ['controller' => 'Studios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user, ['novalidate' => 'novalidate']) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('studios.0.name', ['label' => 'Studio Name']);
            echo $this->Form->input('studios.0.address');
            echo $this->Form->input('studios.0.city');
            echo $this->Form->input('studios.0.state_id', ['options' => $states, 'empty' => 'Choose One']);
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
