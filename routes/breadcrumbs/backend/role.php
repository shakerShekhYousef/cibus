<?php
// Home > Roles
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Roles', route('roles.index'));
});
// Home > create_Role
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Create Role', route('roles.create'));
});
// Home > Roles > Edit
Breadcrumbs::for('roles.edit', function ($trail, $id) {
    $trail->parent('roles.index');
    $trail->push('Edit Role', route('roles.edit', $id));
});
// Home > Roles > Show
Breadcrumbs::for('roles.show', function ($trail, $id) {
    $trail->parent('roles.index');
    $trail->push('Show Role', route('roles.show', $id));
});
