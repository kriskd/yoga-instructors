<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Spaces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Studios'), ['controller' => 'Studios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Studio'), ['controller' => 'Studios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="spaces form large-10 medium-9 columns">
    <?= $this->Form->create($space) ?>
    <fieldset>
        <legend><?= __('Add Space') ?></legend>
        <?php
            echo $this->Form->input('hot_room');
            echo $this->Form->input('max_participants');
            echo $this->Form->input('cost');
            echo $this->Form->input('donation');
            echo $this->Form->input('description');
            echo $this->Form->input('start');
            echo $this->Form->input('end');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
