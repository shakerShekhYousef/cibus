<?php


namespace App\Models\Traits\CityTraits;


use App\Models\Restaurant;

trait CityRelationship
{
    public function restaurants(){
        return $this->hasMany(Restaurant::class);
    }
}
