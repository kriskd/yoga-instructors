<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Styles'), ['controller' => 'Styles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Style'), ['controller' => 'Styles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="sessions view large-10 medium-9 columns">
    <h2><?= h($session->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Space') ?></h6>
            <p><?= $session->has('space') ? $this->Html->link($session->space->id, ['controller' => 'Spaces', 'action' => 'view', $session->space->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Style') ?></h6>
            <p><?= $session->has('style') ? $this->Html->link($session->style->name, ['controller' => 'Styles', 'action' => 'view', $session->style->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($session->id) ?></p>
            <h6 class="subheader"><?= __('Min Students') ?></h6>
            <p><?= $this->Number->format($session->min_students) ?></p>
            <h6 class="subheader"><?= __('Cost') ?></h6>
            <p><?= $this->Number->format($session->cost) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Start') ?></h6>
            <p><?= h($session->start) ?></p>
            <h6 class="subheader"><?= __('End') ?></h6>
            <p><?= h($session->end) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Donation') ?></h6>
            <p><?= $session->donation ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($session->description)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Participants') ?></h4>
    <?php if (!empty($session->participants)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Session Id') ?></th>
            <th><?= __('Instructor Id') ?></th>
            <th><?= __('Role Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($session->participants as $participants): ?>
        <tr>
            <td><?= h($participants->id) ?></td>
            <td><?= h($participants->session_id) ?></td>
            <td><?= h($participants->instructor_id) ?></td>
            <td><?= h($participants->role_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Participants', 'action' => 'view', $participants->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Participants', 'action' => 'edit', $participants->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Participants', 'action' => 'delete', $participants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participants->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
