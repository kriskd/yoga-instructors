<?php
    echo $this->Form->input('studio.name', ['label' => 'Studio Name']);
    echo $this->Form->input('studio.address');
    echo $this->Form->input('studio.city');
    echo $this->Form->input('studio.state_id', ['options' => $states, 'empty' => 'Choose One', 'default' => 'WI']);
    echo $this->Form->input('studio.postal_code');
    echo $this->Form->input('studio.contact');
?>
