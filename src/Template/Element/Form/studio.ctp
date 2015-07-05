<?= $this->Form->input('studio.name', ['label' => 'Studio Name']); ?>
<?= $this->Form->input('studio.address'); ?>
<div class="row">
    <div class="col-sm-6 col-xs-12">
        <?= $this->Form->input('studio.city'); ?>
    </div>
    <div class="col-sm-2 col-xs-12">
        <?= $this->Form->input('studio.state_id', ['options' => $states, 'empty' => 'Choose One', 'default' => 'WI']); ?>
    </div>
    <div class="col-sm-4 col-xs-12">
        <?= $this->Form->input('studio.postal_code'); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?= $this->Form->input('studio.contact'); ?>
    </div>
</div>
