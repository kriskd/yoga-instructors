<div class="spaces view large-10 medium-9 columns">
    <div class="row">
        <div class="large-5 columns strings">
            <dl>
                <dt><?= __('Studio') ?></dt>
                <dd><?= $space->has('studio') ? $this->Html->link($space->studio->name, ['controller' => 'Studios', 'action' => 'view', $space->studio->id]) : '' ?></dd>
                <dt><?= __('Max Participants') ?></dt>
                <dd><?= $this->Number->format($space->max_participants) ?></dd>
                <dt><?= __('Cost') ?></dt>
                <dd><?= $this->Number->format($space->cost) ?></dd>
                <dt><?= __('Start') ?></dt>
                <dd><?= h($space->start) ?></dd>
                <dt><?= __('End') ?></dt>
                <dd><?= h($space->end) ?></dd>
                <dt><?= __('Hot Room') ?></dt>
                <dd><?= $space->hot_room ? __('Yes') : __('No'); ?></dd>
                <dt class="subheader"><?= __('Donation') ?></dt>
                <dd><?= $space->donation ? __('Yes') : __('No'); ?></dd>
                <dt><?= __('Description') ?></dt>
                <dd><?= $this->Text->autoParagraph(h($space->description)) ?></dd>
            </dl>
            <?php if (empty($space->session) && $authUser['type'] == 'instructor'): ?>
                <?php echo $this->Html->link('Book This Space', [
                    'controller' => 'sessions',
                    'action' => 'add', $space->id,
                ]); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if (!empty($space->session)): ?>
    <div class="related row">
        <div class="column large-12">
        <h4 class="subheader"><?= __('Booked Class') ?></h4>
        <table class="table">
            <tr>
                <th><?= __('Start') ?></th>
                <th><?= __('End') ?></th>
                <th><?= __('Instructor') ?></th>
                <th><?= __('Style') ?></th>
                <th><?= __('Min Students') ?></th>
                <th><?= __('Cost') ?></th>
                <th><?= __('Donation') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <tr>
                <td><?= h($space->session->start) ?></td>
                <td><?= h($space->session->end) ?></td>
                <td>
                    <?php foreach ($space->session->participants as $participants): ?>
                        <?= h($participants->instructor->full_name) ?>
                    <?php endforeach; ?>
                </td>
                <td><?= h($space->session->style->name) ?></td>
                <td><?= h($space->session->min_students) ?></td>
                <td><?= h($space->session->cost) ?></td>
                <td><?= h($space->session->donation) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sessions', 'action' => 'view', $space->session->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sessions', 'action' => 'edit', $space->session->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sessions', 'action' => 'delete', $space->session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $space->session->id)]) ?>

                </td>
            </tr>

        </table>
        </div>
    </div>
<?php endif; ?>
