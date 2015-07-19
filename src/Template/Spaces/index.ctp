<div class="spaces index large-10 medium-9 columns">
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('start') ?></th>
            <th><?= $this->Paginator->sort('end') ?></th>
            <th><?= $this->Paginator->sort('studio_id') ?></th>
            <th><?= $this->Paginator->sort('hot_room') ?></th>
            <th><?= $this->Paginator->sort('max_participants') ?></th>
            <th><?= $this->Paginator->sort('cost') ?></th>
            <th><?= $this->Paginator->sort('donation') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($spaces as $space): ?>
        <tr>
            <td><?= h($space->start) ?></td>
            <td><?= h($space->end) ?></td>
            <td>
                <?= $space->has('studio') ? $this->Html->link($space->studio->name, ['controller' => 'Studios', 'action' => 'view', $space->studio->id]) : '' ?>
            </td>
            <td><?= $space->hot_room ? __('Yes') : __('No'); ?></td>
            <td><?= $this->Number->format($space->max_participants) ?></td>
            <td><?= $this->Number->format($space->cost) ?></td>
            <td><?= $space->donation ? __('Yes') : __('No'); ?></td>
            <td class="actions">
                <?php //if ($authUser['type'] == 'studio'): ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $space->id]) ?>
                <?php //endif; ?>
                <?php /*
                <?php if ($authUser['type'] == 'instructor'): ?>
                    <?= $this->Html->link(__('Book'), ['controller' => 'sessions', 'action' => 'add', $space->id]) ?>
                <?php endif; ?>
                */ ?>
<?php /*
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $space->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $space->id], ['confirm' => __('Are you sure you want to delete # {0}?', $space->id)]) ?>
*/ ?>
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
