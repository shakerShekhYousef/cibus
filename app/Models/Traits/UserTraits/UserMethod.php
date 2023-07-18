<?php

namespace App\Models\Traits\UserTraits;

use App\Models\Role;

/**
 * Trait UserMethod.
 */
trait UserMethod
{
    public function hasRole($role)
    {
        if ($this->role()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        return $this->hasRole(config('access.users.admin_role'));
    }
    public function isUser()
    {
        return $this->hasRole(config('access.users.default_role'));
    }
    public function isRestaurant()
    {
        return $this->hasRole('restaurant');
    }
    public function deffaultRole()
    {
        $role = Role::where('name', config('access.users.default_role'))->first();
        return $role->id;
    }
}
