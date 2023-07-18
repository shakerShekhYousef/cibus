<?php
// Home > Cities
Breadcrumbs::for('cities.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Cities', route('cities.index'));
});
// Home > create_City
Breadcrumbs::for('cities.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Create City', route('cities.create'));
});
// Home > Cities > Edit
Breadcrumbs::for('cities.edit', function ($trail, $id) {
    $trail->parent('cities.index');
    $trail->push('Edit City', route('cities.edit', $id));
});
// Home > Cities > Show
Breadcrumbs::for('cities.show', function ($trail, $id) {
    $trail->parent('cities.index');
    $trail->push('Show City', route('cities.show', $id));
});
