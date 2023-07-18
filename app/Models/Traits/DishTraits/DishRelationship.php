<?php


namespace App\Models\Traits\DishTraits;


use App\Models\Category;
use App\Models\Restaurant;

trait DishRelationship
{
    public function restaurant(){
        return $this->belongsTo(Restaurant::class,'restaurant_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
