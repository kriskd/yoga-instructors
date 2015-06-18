<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Instructor'), ['action' => 'edit', $instructor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Instructor'), ['action' => 'delete', $instructor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $instructor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Instructors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Instructor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="instructors view large-10 medium-9 columns">
    <h2><?= h($instructor->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $instructor->has('user') ? $this->Html->link($instructor->user->id, ['controller' => 'Users', 'action' => 'view', $instructor->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($instructor->id) ?></p>
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= $this->Number->format($instructor->first_name) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= $this->Number->format($instructor->last_name) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Bio') ?></h6>
            <?= $this->Text->autoParagraph(h($instructor->bio)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Participants') ?></h4>
    <?php if (!empty($instructor->participants)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Session Id') ?></th>
            <th><?= __('Instructor Id') ?></th>
            <th><?= __('Role Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($instructor->participants as $participants): ?>
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
