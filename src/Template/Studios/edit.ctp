<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Studios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="studios form large-10 medium-9 columns">
    <?= $this->Form->create($studio, ['novalidate' => 'novalidate']) ?>
    <fieldset>
        <legend><?= __('Edit Studio') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('address');
            echo $this->Form->input('city');
            echo $this->Form->input('state_id', ['options' => $states, 'empty' => true]);
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
