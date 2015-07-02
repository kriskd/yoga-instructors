<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create($user) ?>
    <?php $this->Form->templates([
        'input' => '<input class="form-control" type={{type}} name={{name}} {{attrs}} >',
    ]); ?>
        <fieldset>
            <legend><?= __('Please enter your email') ?></legend>
            <?= $this->Form->input('email') ?>
        </fieldset>
    <?= $this->Form->button(__('Send'), ['class' => 'btn btn-default']); ?>
    <?= $this->Form->end() ?>
</div>
