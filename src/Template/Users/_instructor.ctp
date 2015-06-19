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
            echo $this->Form->input('instructors.0.first_name');
            echo $this->Form->input('instructors.0.last_name');
            echo $this->Form->input('users.email');
            echo $this->Form->input('users.password');
            echo $this->Form->input('users.password_confirm', ['type' => 'password']);
            echo $this->Form->input('users.phone');
            echo $this->Form->input('instructors.0.bio');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
