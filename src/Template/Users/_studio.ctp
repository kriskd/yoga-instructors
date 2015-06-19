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
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('Studio.name');
            echo $this->Form->input('Studio.address');
            echo $this->Form->input('Studio.city');
            echo $this->Form->input('Studio.state_id');
            echo $this->Form->input('Studio.postal_code');
            echo $this->Form->input('Studio.contact', ['label' => 'Contact Name']);
            echo $this->Form->input('User.email');
            echo $this->Form->input('User.password');
            echo $this->Form->input('User.password_confirm', ['type' => 'password']);
            echo $this->Form->input('User.phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
