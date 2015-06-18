<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Participant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Instructors'), ['controller' => 'Instructors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Instructor'), ['controller' => 'Instructors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="participants index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('session_id') ?></th>
            <th><?= $this->Paginator->sort('instructor_id') ?></th>
            <th><?= $this->Paginator->sort('role_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($participants as $participant): ?>
        <tr>
            <td><?= $this->Number->format($participant->id) ?></td>
            <td>
                <?= $participant->has('session') ? $this->Html->link($participant->session->id, ['controller' => 'Sessions', 'action' => 'view', $participant->session->id]) : '' ?>
            </td>
            <td>
                <?= $participant->has('instructor') ? $this->Html->link($participant->instructor->id, ['controller' => 'Instructors', 'action' => 'view', $participant->instructor->id]) : '' ?>
            </td>
            <td>
                <?= $participant->has('role') ? $this->Html->link($participant->role->name, ['controller' => 'Roles', 'action' => 'view', $participant->role->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $participant->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $participant->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $participant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participant->id)]) ?>
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
