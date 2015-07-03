<div class="spaces form large-10 medium-9 columns">
    <?= $this->Form->create($space) ?>
    <?php $this->Form->templates([
        'input' => '<input class="form-control" type={{type}} name={{name}} {{attrs}} >',
        'nestingLabel' => '<label class="push-down"{{attrs}}>{{input}}{{text}}</label>',
        'textarea' => '<textarea class="form-control {{attrs}}>{{value}}</textarea>',
        'select' => '<select class="form-control" name={{name}} {{attrs}}>{{content}}</select>',
        'dateWidget' => '<div class="row"><div class="col-sm-2 col-xs-12">{{month}}</div><div class="col-sm-2 col-xs-12">{{day}}</div><div class="col-sm-2 col-xs-12">{{year}}</div><div class="col-sm-2 col-xs-12">{{hour}}</div><div class="col-sm-2 col-xs-12">{{minute}}</div><div class="col-sm-2 col-xs-12">{{meridian}}</div><div class="col-sm-2 col-xs-12"></div></div>',
    ]); ?>
    <fieldset>
        <legend><?= __('Add Space') ?></legend>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <?= $this->Form->input('max_participants'); ?>
            </div>
            <div class="col-sm-6 col-xs-12">
                <?= $this->Form->input('hot_room'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <?= $this->Form->input('cost'); ?>
            </div>
            <div class="col-sm-6 col-xs-12">
                <?= $this->Form->input('donation'); ?>
            </div>
        </div>
                <?= $this->Form->input('description'); ?>
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
