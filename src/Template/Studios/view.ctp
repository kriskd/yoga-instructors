<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Studio'), ['action' => 'edit', $studio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Studio'), ['action' => 'delete', $studio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Studios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="studios view large-10 medium-9 columns">
    <h2><?= h($studio->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $studio->has('user') ? $this->Html->link($studio->user->id, ['controller' => 'Users', 'action' => 'view', $studio->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($studio->name) ?></p>
            <h6 class="subheader"><?= __('Address') ?></h6>
            <p><?= h($studio->address) ?></p>
            <h6 class="subheader"><?= __('City') ?></h6>
            <p><?= h($studio->city) ?></p>
            <h6 class="subheader"><?= __('State') ?></h6>
            <p><?= $studio->has('state') ? $this->Html->link($studio->state->name, ['controller' => 'States', 'action' => 'view', $studio->state->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Postal Code') ?></h6>
            <p><?= h($studio->postal_code) ?></p>
            <h6 class="subheader"><?= __('Contact') ?></h6>
            <p><?= h($studio->contact) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($studio->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Spaces') ?></h4>
    <?php if (!empty($studio->spaces)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Studio Id') ?></th>
            <th><?= __('Hot Room') ?></th>
            <th><?= __('Max Participants') ?></th>
            <th><?= __('Cost') ?></th>
            <th><?= __('Donation') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Start') ?></th>
            <th><?= __('End') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($studio->spaces as $spaces): ?>
        <tr>
            <td><?= h($spaces->id) ?></td>
            <td><?= h($spaces->studio_id) ?></td>
            <td><?= h($spaces->hot_room) ?></td>
            <td><?= h($spaces->max_participants) ?></td>
            <td><?= h($spaces->cost) ?></td>
            <td><?= h($spaces->donation) ?></td>
            <td><?= h($spaces->description) ?></td>
            <td><?= h($spaces->start) ?></td>
            <td><?= h($spaces->end) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Spaces', 'action' => 'view', $spaces->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Spaces', 'action' => 'edit', $spaces->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Spaces', 'action' => 'delete', $spaces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $spaces->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
