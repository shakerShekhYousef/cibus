<?php

namespace App\Models;

use App\Models\Traits\DishTraits\DishMethod;
use App\Models\Traits\DishTraits\DishRelationship;
use App\Models\Traits\DishTraits\DishScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory, DishScope, DishRelationship, DishMethod;

   protected $fillable=[
       'name',
       'image',
       'restaurant_id',
       'description',
       'price',
       'category_id',
       'rating'
   ];
}
