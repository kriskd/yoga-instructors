<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Space'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Studios'), ['controller' => 'Studios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Studio'), ['controller' => 'Studios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="spaces index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('studio_id') ?></th>
            <th><?= $this->Paginator->sort('hot_room') ?></th>
            <th><?= $this->Paginator->sort('max_participants') ?></th>
            <th><?= $this->Paginator->sort('cost') ?></th>
            <th><?= $this->Paginator->sort('donation') ?></th>
            <th><?= $this->Paginator->sort('start') ?></th>
            <th><?= $this->Paginator->sort('end') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($spaces as $space): ?>
        <tr>
            <td>
                <?= $space->has('studio') ? $this->Html->link($space->studio->name, ['controller' => 'Studios', 'action' => 'view', $space->studio->id]) : '' ?>
            </td>
            <td><?= h($space->hot_room) ?></td>
            <td><?= $this->Number->format($space->max_participants) ?></td>
            <td><?= $this->Number->format($space->cost) ?></td>
            <td><?= h($space->donation) ?></td>
            <td><?= h($space->start) ?></td>
            <td><?= h($space->end) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $space->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $space->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $space->id], ['confirm' => __('Are you sure you want to delete # {0}?', $space->id)]) ?>
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
