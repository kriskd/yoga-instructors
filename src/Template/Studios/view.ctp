<div class="studios view large-10 medium-9 columns">
    <h2><?= h($studio->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <p><?= h($studio->address) ?></p>
            <p><?= h($studio->city) ?>, <?= h($studio->state->name) ?> <?= h($studio->postal_code) ?></p>
            <p><?= __('Contact') ?>: <?= h($studio->contact) ?></p>
            <p><?= $studio->user->email; ?>
            <p><?= $studio->user->phone; ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Available Spaces') ?></h4>
    <?php if (!empty($studio->spaces)): ?>
    <table class="table">
        <tr>
            <th><?= __('Start') ?></th>
            <th><?= __('End') ?></th>
            <th><?= __('Hot Room') ?></th>
            <th><?= __('Max Participants') ?></th>
            <th><?= __('Cost') ?></th>
            <th><?= __('Donation') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($studio->spaces as $spaces): ?>
        <tr>
            <td><?= h($spaces->start) ?></td>
            <td><?= h($spaces->end) ?></td>
            <td><?= h($spaces->hot_room) ?></td>
            <td><?= h($spaces->max_participants) ?></td>
            <td><?= h($spaces->cost) ?></td>
            <td><?= h($spaces->donation) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('Details'), ['controller' => 'Spaces', 'action' => 'view', $spaces->id]) ?>
                <?php if ($authUser['type'] == 'studio'): ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Spaces', 'action' => 'edit', $spaces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Spaces', 'action' => 'delete', $spaces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $spaces->id)]) ?>
                <?php else: ?>
                    <?= $this->Html->link(__('Reserve'), ['controller' => 'participants', 'action' => 'add']); ?>
                <?php endif; ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
