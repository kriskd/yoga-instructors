<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <?php $this->Form->templates([
        'input' => '<input class="form-control" type={{type}} name={{name}} {{attrs}} >',
    ]); ?>
        <fieldset>
            <legend><?= __('Please enter your email and password') ?></legend>
            <?= $this->Form->input('email') ?>
            <?= $this->Form->input('password') ?>
        </fieldset>
    <?= $this->Form->button(__('Login'), ['class' => 'btn btn-default']); ?>
    <?= $this->Form->end() ?>
    <?php echo $this->Html->link('Forgot Password', ['action' => 'forgot']); ?>
</div>
