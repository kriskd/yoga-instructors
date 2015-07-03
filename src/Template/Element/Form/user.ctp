<?php
    echo $this->Form->input('user.phone');
    echo $this->Form->input('user.email');
?>
<div class="row">
    <div class="col-sm-6 col-xs-12">
        <?= $this->Form->input('user.password', ['value' => '']); ?>
    </div>
    <div class="col-sm-6 col-xs-12">
        <?= $this->Form->input('user.password_confirm', ['type' => 'password']); ?>
    </div>
</div>
