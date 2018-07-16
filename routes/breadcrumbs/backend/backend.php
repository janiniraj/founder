<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.pages.index', function ($trail) {
    $trail->push(__('strings.backend.pages.title'), route('admin.pages.index'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
