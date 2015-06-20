<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Space'), ['action' => 'edit', $space->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Space'), ['action' => 'delete', $space->id], ['confirm' => __('Are you sure you want to delete # {0}?', $space->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Spaces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Space'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Studios'), ['controller' => 'Studios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studio'), ['controller' => 'Studios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="spaces view large-10 medium-9 columns">
    <h2><?= h($space->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Studio') ?></h6>
            <p><?= $space->has('studio') ? $this->Html->link($space->studio->name, ['controller' => 'Studios', 'action' => 'view', $space->studio->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($space->id) ?></p>
            <h6 class="subheader"><?= __('Max Participants') ?></h6>
            <p><?= $this->Number->format($space->max_participants) ?></p>
            <h6 class="subheader"><?= __('Cost') ?></h6>
            <p><?= $this->Number->format($space->cost) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Start') ?></h6>
            <p><?= h($space->start) ?></p>
            <h6 class="subheader"><?= __('End') ?></h6>
            <p><?= h($space->end) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Hot Room') ?></h6>
            <p><?= $space->hot_room ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Donation') ?></h6>
            <p><?= $space->donation ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($space->description)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Sessions') ?></h4>
    <?php if (!empty($space->sessions)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Space Id') ?></th>
            <th><?= __('Style Id') ?></th>
            <th><?= __('Min Students') ?></th>
            <th><?= __('Cost') ?></th>
            <th><?= __('Donation') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Start') ?></th>
            <th><?= __('End') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($space->sessions as $sessions): ?>
        <tr>
            <td><?= h($sessions->id) ?></td>
            <td><?= h($sessions->space_id) ?></td>
            <td><?= h($sessions->style_id) ?></td>
            <td><?= h($sessions->min_students) ?></td>
            <td><?= h($sessions->cost) ?></td>
            <td><?= h($sessions->donation) ?></td>
            <td><?= h($sessions->description) ?></td>
            <td><?= h($sessions->start) ?></td>
            <td><?= h($sessions->end) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Sessions', 'action' => 'view', $sessions->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Sessions', 'action' => 'edit', $sessions->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sessions', 'action' => 'delete', $sessions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sessions->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
