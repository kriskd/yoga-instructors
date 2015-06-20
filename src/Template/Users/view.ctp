<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Instructors'), ['controller' => 'Instructors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Instructor'), ['controller' => 'Instructors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Studios'), ['controller' => 'Studios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studio'), ['controller' => 'Studios', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('Phone') ?></h6>
            <p><?= h($user->phone) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Admin') ?></h6>
            <p><?= $user->admin ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= $user->active ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Instructors') ?></h4>
    <?php if (!empty($user->instructors)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('First Name') ?></th>
            <th><?= __('Last Name') ?></th>
            <th><?= __('Bio') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->instructors as $instructors): ?>
        <tr>
            <td><?= h($instructors->id) ?></td>
            <td><?= h($instructors->user_id) ?></td>
            <td><?= h($instructors->first_name) ?></td>
            <td><?= h($instructors->last_name) ?></td>
            <td><?= h($instructors->bio) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Instructors', 'action' => 'view', $instructors->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Instructors', 'action' => 'edit', $instructors->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Instructors', 'action' => 'delete', $instructors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $instructors->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Studios') ?></h4>
    <?php if (!empty($user->studios)): ?>
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
        <?php foreach ($user->studios as $studios): ?>
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
