<?php

namespace App\Models\Traits\RoleTraits;

use App\Models\Role;
use Illuminate\Support\Facades\DB;

trait RoleMethod
{
    public function isAdmin()
    {
        return $this->name === config('access.users.admin_role');
    }

    public function adminRole()
    {
        $admin = DB::table('roles')
            ->where('name', config('access.users.admin_role'))->first();
        return $admin->id;
    }

    public static function defaultRole()
    {
        $default = DB::table('roles')
            ->where('name', config('access.users.default_role'))->first();
        return $default->id;
    }

    public static function restaurantRole()
    {
        $restaurant = DB::table('roles')
            ->where('name', config('access.users.restaurant_role'))->first();
        return $restaurant->id;
    }
}
