<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Styles'), ['controller' => 'Styles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Style'), ['controller' => 'Styles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="sessions index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('space_id') ?></th>
            <th><?= $this->Paginator->sort('style_id') ?></th>
            <th><?= $this->Paginator->sort('min_students') ?></th>
            <th><?= $this->Paginator->sort('cost') ?></th>
            <th><?= $this->Paginator->sort('donation') ?></th>
            <th><?= $this->Paginator->sort('start') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($sessions as $session): ?>
        <tr>
            <td>
                <?= $session->has('space') ? $this->Html->link($session->space->id, ['controller' => 'Spaces', 'action' => 'view', $session->space->id]) : '' ?>
            </td>
            <td>
                <?= $session->has('style') ? $this->Html->link($session->style->name, ['controller' => 'Styles', 'action' => 'view', $session->style->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($session->min_students) ?></td>
            <td><?= $this->Number->format($session->cost) ?></td>
            <td><?= h($session->donation) ?></td>
            <td><?= h($session->start) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $session->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $session->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
