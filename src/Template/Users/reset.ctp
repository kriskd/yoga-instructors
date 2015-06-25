<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Reset password') ?></legend>
            <?= $this->Form->input('user.password') ?>
            <?= $this->Form->input('user.password_confirm', ['type' => 'password']) ?>
        </fieldset>
    <?= $this->Form->button(__('Reset')); ?>
    <?= $this->Form->end() ?>
</div>
