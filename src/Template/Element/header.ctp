<header>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <?php echo $this->Form->button('<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>', [
                    'type' => 'button',
                    'class' => 'navbar-toggle collapsed',
                    'data-toggle' => 'collapse',
                    'data-target' => '#navbar',
                    'aria-expanded' => 'false',
                ]); ?>
                <?php echo $this->Html->link('Yoga', '/', [
                    'class' => 'navbar-brand'
                ]); ?>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <?php if (isset($authUser)): ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <?= $this->Html->link('Welcome, '.$name. ' <span class="caret"></span>', '#', [
                                'class' => 'dropdown-toggle',
                                'data-toggle' => 'dropdown',
                                'role' => 'button',
                                'aria-haspopup' => 'true',
                                'aria-expanded' => 'false',
                                'escape' => false,
                            ]); ?>
                            <ul class="dropdown-menu">
                                <li>
                                    <?= $this->Html->link('Edit Profile', [
                                        'controller' => 'Users',
                                        'action' => 'edit',
                                    ]); ?>
                                </li>
                                <li>
                                    <?= $this->Html->link('Logout', [
                                        'controller' => 'Users',
                                        'action' => 'logout',
                                    ]); ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <?= $this->Form->create(null, [
                        'class' => 'navbar-form navbar-right',
                        'url' => [
                            'controller' => 'Users',
                            'action' => 'login',
                        ],
                    ]) ?>
                    <?php $this->Form->templates([
                        'input' => '<input class="form-control" type={{type}} name={{name}} {{attrs}} >'
                    ]); ?>
                    <div class="form-group">
                        <?= $this->Form->input('email', ['label' => false, 'placeholder' => 'Email']) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('password', ['label' => false, 'placeholder' => 'Password']) ?>
                    </div>
                    <?= $this->Form->button(__('Login'), ['class' => 'btn btn-default']); ?>
                    <?= $this->Form->end() ?>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
