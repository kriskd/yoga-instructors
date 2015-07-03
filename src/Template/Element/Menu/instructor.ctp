<li>
    <?= $this->Html->link('My Sessions', [
        'controller' => 'Sessions',
        'action' => 'index',
    ]); ?>
</li>
<li>
    <?= $this->Html->link('Create Session', [
        'controller' => 'Sessions',
        'action' => 'add',
    ]); ?>
</li>
<li>
    <?= $this->Html->link('Join Session', [
        'controller' => 'Participants',
        'action' => 'add',
    ]); ?>
</li>
