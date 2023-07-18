<?php
//Home
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push(__('Home'), route('admin.home'));
});
require __DIR__.'/user.php';
require __DIR__.'/role.php';
require __DIR__.'/restaurant.php';
require __DIR__.'/dish.php';
require __DIR__.'/city.php';
require __DIR__.'/category.php';
