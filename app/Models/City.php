<?php

namespace App\Models;

use App\Models\Traits\CityTraits\CityMethod;
use App\Models\Traits\CityTraits\CityRelationship;
use App\Models\Traits\CityTraits\CityScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, CityMethod, CityRelationship, CityScope;

    protected $fillable = [
        'name',
    ];
}
