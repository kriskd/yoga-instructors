<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit State'), ['action' => 'edit', $state->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete State'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id)]) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Studios'), ['controller' => 'Studios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studio'), ['controller' => 'Studios', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="states view large-10 medium-9 columns">
    <h2><?= h($state->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= h($state->id) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($state->name) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Studios') ?></h4>
    <?php if (!empty($state->studios)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Address') ?></th>
            <th><?= __('City') ?></th>
            <th><?= __('State Id') ?></th>
            <th><?= __('Postal Code') ?></th>
            <th><?= __('Contact') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($state->studios as $studios): ?>
        <tr>
            <td><?= h($studios->id) ?></td>
            <td><?= h($studios->user_id) ?></td>
            <td><?= h($studios->name) ?></td>
            <td><?= h($studios->address) ?></td>
            <td><?= h($studios->city) ?></td>
            <td><?= h($studios->state_id) ?></td>
            <td><?= h($studios->postal_code) ?></td>
            <td><?= h($studios->contact) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Studios', 'action' => 'view', $studios->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Studios', 'action' => 'edit', $studios->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Studios', 'action' => 'delete', $studios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studios->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
