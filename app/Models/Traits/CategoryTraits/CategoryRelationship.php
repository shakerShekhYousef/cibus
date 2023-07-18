<?php


namespace App\Models\Traits\CategoryTraits;


use App\Models\Restaurant;

trait CategoryRelationship
{

    public function restaurant(){
        return $this->hasOne(Restaurant::class);
    }
}
