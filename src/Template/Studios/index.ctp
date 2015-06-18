<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Studio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="studios index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('address') ?></th>
            <th><?= $this->Paginator->sort('city') ?></th>
            <th><?= $this->Paginator->sort('state_id') ?></th>
            <th><?= $this->Paginator->sort('postal_code') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($studios as $studio): ?>
        <tr>
            <td><?= $this->Number->format($studio->id) ?></td>
            <td>
                <?= $studio->has('user') ? $this->Html->link($studio->user->id, ['controller' => 'Users', 'action' => 'view', $studio->user->id]) : '' ?>
            </td>
            <td><?= h($studio->name) ?></td>
            <td><?= h($studio->address) ?></td>
            <td><?= h($studio->city) ?></td>
            <td>
                <?= $studio->has('state') ? $this->Html->link($studio->state->name, ['controller' => 'States', 'action' => 'view', $studio->state->id]) : '' ?>
            </td>
            <td><?= h($studio->postal_code) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $studio->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studio->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studio->id)]) ?>
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
