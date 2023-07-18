<?php

namespace App\Models\Traits\UserTraits;

use App\Models\Role;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
