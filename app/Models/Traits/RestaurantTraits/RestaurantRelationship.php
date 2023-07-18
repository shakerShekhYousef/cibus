<?php


namespace App\Models\Traits\RestaurantTraits;


use App\Models\Category;
use App\Models\City;
use App\Models\Dish;
use App\Models\User;

trait RestaurantRelationship
{
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function dishes(){
        return $this->hasMany(Dish::class);
    }
}
