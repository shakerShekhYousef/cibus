<?php

namespace App\Models\Traits\RoleTraits;

use App\Models\User;

trait RoleRelationship
{
    public function users(){
        return $this->hasMany(User::class);
    }
}
