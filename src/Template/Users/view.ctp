<?php if (!empty($user->instructor->participants)): ?>
    <div class="related row">
        <div class="column large-12">
        <h4 class="subheader"><?= __('My Sessions') ?></h4>
        <table class="table">
            <tr>
                <th><?= __('Session Start') ?></th>
                <th><?= __('Session End') ?></th>
                <th><?= __('Studio') ?></th>
                <th><?= __('Role') ?></th>
            </tr>
            <?php foreach ($user->instructor->participants as $participant): ?>
                <tr>
                    <td><?= h($participant->session->start) ?></td>
                    <td><?= h($participant->session->end) ?></td>
                    <td><?= h($participant->session->space->studio->name) ?></td>
                    <td><?= h($participant->role->name) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>
<?php if (!empty($user->studio->spaces)): ?>
    <div class="related row">
        <div class="column large-12">
        <h4 class="subheader"><?= __('My Spaces') ?></h4>
        <table class="table">
            <tr>
                <th><?= __('Space Start') ?></th>
                <th><?= __('Space End') ?></th>
                <th><?= __('Booked By') ?></th>
                <th></th>
            </tr>
            <?php foreach ($user->studio->spaces as $space): ?>
                <tr>
                    <td><?= h($space->start) ?></td>
                    <td><?= h($space->end) ?></td>
                    <td>
                        <?php if (!empty($space->session->participants)): ?>
                            <?php foreach ($space->session->participants as $participant): ?>
                                <?= $participant->role_id == 1 ? h($participant->instructor->full_name) : ''; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $this->Html->link('Edit', ['controller' => 'Spaces', 'action' => 'edit', $space->id]); ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>
