<?php
// Home > Dishes
Breadcrumbs::for('dishes.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Dishes', route('dishes.index'));
});
// Home > create_Dish
Breadcrumbs::for('dishes.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Create Dish', route('dishes.create'));
});
// Home > Dishes > Edit
Breadcrumbs::for('dishes.edit', function ($trail, $id) {
    $trail->parent('dishes.index');
    $trail->push('Edit Dish', route('dishes.edit', $id));
});
// Home > Dishes > Show
Breadcrumbs::for('dishes.show', function ($trail, $id) {
    $trail->parent('dishes.index');
    $trail->push('Show Dish', route('dishes.show', $id));
});
