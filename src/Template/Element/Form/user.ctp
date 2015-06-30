<?php
    echo $this->Form->input('email');
    echo $this->Form->input('password', ['value' => '']);
    echo $this->Form->input('password_confirm', ['type' => 'password']);
    echo $this->Form->input('phone');
?>
