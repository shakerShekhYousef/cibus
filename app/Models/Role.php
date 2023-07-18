<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\RoleTraits\RoleMethod;
use App\Models\Traits\RoleTraits\RoleRelationship;
use App\Models\Traits\RoleTraits\RoleScope;

class Role extends Model
{
    use HasFactory, RoleRelationship, RoleScope, RoleMethod;

    protected $fillable = [
        'name',
    ];
}
