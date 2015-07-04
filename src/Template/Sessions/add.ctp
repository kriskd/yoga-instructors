<div class="sessions form large-10 medium-9 columns">
    <?= $this->Form->create($session) ?>
    <?php $this->Form->templates([
        'input' => '<input class="form-control" type={{type}} name={{name}} {{attrs}} >',
        'textarea' => '<textarea class="form-control {{attrs}}>{{value}}</textarea>',
        'select' => '<select class="form-control" name={{name}} {{attrs}}>{{content}}</select>',
        'dateWidget' => '<div class="row"><div class="col-sm-2 col-xs-12">{{month}}</div><div class="col-sm-2 col-xs-12">{{day}}</div><div class="col-sm-2 col-xs-12">{{year}}</div><div class="col-sm-2 col-xs-12">{{hour}}</div><div class="col-sm-2 col-xs-12">{{minute}}</div><div class="col-sm-2 col-xs-12">{{meridian}}</div><div class="col-sm-2 col-xs-12"></div></div>',
    ]); ?>
    <fieldset>
        <legend><?= __('Add Session') ?></legend>
        <?php
            echo $this->Form->input('style_id', ['options' => $styles]);
            echo $this->Form->input('min_students');
            echo $this->Form->input('cost');
            echo $this->Form->input('donation');
            echo $this->Form->input('description'); ?>
            <?= $this->Form->input('start', [
                'minYear' => date('Y'),
                'maxYear' => date('Y')+1,
                'interval' => 15,
                'timeFormat' => 12,
            ]); ?>
            <?= $this->Form->input('end', [
                'minYear' => date('Y'),
                'maxYear' => date('Y')+1,
                'interval' => 15,
                'timeFormat' => 12,
            ]); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
