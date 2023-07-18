<?php
// Home > Categories
Breadcrumbs::for('categories.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Categories', route('categories.index'));
});
// Home > create_Category
Breadcrumbs::for('categories.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Create Category', route('categories.create'));
});
// Home > Categories > Edit
Breadcrumbs::for('categories.edit', function ($trail, $id) {
    $trail->parent('categories.index');
    $trail->push('Edit Category', route('categories.edit', $id));
});
// Home > Categories > Show
Breadcrumbs::for('categories.show', function ($trail, $id) {
    $trail->parent('categories.index');
    $trail->push('Show Category', route('categories.show', $id));
});
