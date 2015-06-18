<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Style'), ['action' => 'edit', $style->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Style'), ['action' => 'delete', $style->id], ['confirm' => __('Are you sure you want to delete # {0}?', $style->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Styles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Style'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="styles view large-10 medium-9 columns">
    <h2><?= h($style->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($style->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($style->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Sessions') ?></h4>
    <?php if (!empty($style->sessions)): ?>
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
        <?php foreach ($style->sessions as $sessions): ?>
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
