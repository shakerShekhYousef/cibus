<?php
// Home > Restaurants
Breadcrumbs::for('restaurants.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Restaurants', route('restaurants.index'));
});
// Home > Restaurants requests
Breadcrumbs::for('restaurants.requests', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Restaurants Requests', route('restaurants.requests'));
});
// Home > create_restaurant
Breadcrumbs::for('restaurants.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Create Restaurant', route('restaurants.create'));
});
// Home > Restaurants > Edit
Breadcrumbs::for('restaurants.edit', function ($trail, $id) {
    $trail->parent('restaurants.index');
    $trail->push('Edit Restaurant', route('restaurants.edit', $id));
});
// Home > Restaurants > Show
Breadcrumbs::for('restaurants.show', function ($trail, $id) {
    $trail->parent('restaurants.index');
    $trail->push('Show Restaurant', route('restaurants.show', $id));
});
