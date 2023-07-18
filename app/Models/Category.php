<?php

namespace App\Models;

use App\Models\Traits\CategoryTraits\CategoryMethod;
use App\Models\Traits\CategoryTraits\CategoryRelationship;
use App\Models\Traits\CategoryTraits\CategoryScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, CategoryMethod, CategoryRelationship, CategoryScope;
    protected $guarded=[];
}
