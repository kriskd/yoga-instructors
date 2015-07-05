<div class="participants form large-10 medium-9 columns">
    <?= $this->Form->create($participant) ?>
    <fieldset>
        <legend><?= __('Join Session') ?></legend>
        <table class="table">
            <tr>
                <th><?= __('Join'); ?></th>
                <th><?= __('Session Start') ?></th>
                <th><?= __('Session End') ?></th>
                <th><?= __('Studio') ?></th>
                <th><?= __('Taught By') ?></h2>
            </tr>
            <?php foreach ($sessions as $session): ?>
                <tr>
                    <td><?= $this->Form->input('session_id', ['type' => 'checkbox', 'label' => false]); ?></td>
                    <td><?= h($session->start) ?></td>
                    <td><?= h($session->end) ?></td>
                    <td><?= h($session->space->studio->name) ?></td>
                    <td>
                        <?php foreach($session->participants as $participant): ?>
                            <?= h($participant->instructor->full_name); ?>
                        <?php endforeach; ?>
                    </td>
            <?php endforeach; ?>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
