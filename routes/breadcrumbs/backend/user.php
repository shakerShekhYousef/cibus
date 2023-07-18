<?php
// Home > Users
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Users', route('users.index'));
});
// Home > create_user
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Create User', route('users.create'));
});
// Home > Users > Edit
Breadcrumbs::for('users.edit', function ($trail, $id) {
    $trail->parent('users.index');
    $trail->push('Edit User', route('users.edit', $id));
});
// Home > Users > Show
Breadcrumbs::for('users.show', function ($trail, $id) {
    $trail->parent('users.index');
    $trail->push('Show User', route('users.show', $id));
});
