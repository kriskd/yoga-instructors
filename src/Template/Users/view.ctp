<div class="users view large-10 medium-9 columns">
    <div class="row">
        <div class="large-5 columns strings">
            <?php if (!empty($user->instructor)): ?>
                <p><?= h($user->instructor->full_name) ?></p>
                <p><?= h($user->instructor->bio) ?></p>
            <?php endif; ?>
            <?php if (!empty($user->studio)): ?>
                <p><?= h($user->studio->name) ?></p>
                <p><?= h($user->studio->address) ?></p>
                <p><?= h($user->studio->city_st_zip) ?></p>
                <p><?= h($user->studio->contact) ?></p>
            <?php endif; ?>
            <p><?= h($user->email) ?></p>
            <p><?= h($user->phone) ?></p>
        </div>
        <?php /*
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Admin') ?></h6>
            <p><?= $user->admin ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= $user->active ? __('Yes') : __('No'); ?></p>
        </div>
         */ ?>
    </div>
</div>
