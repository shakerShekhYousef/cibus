<?php


namespace App\Models\Traits\RestaurantTraits;


use App\Models\Restaurant;

trait RestaurantMethod
{
    public function isActive()
    {
        return $this->status;
    }

    public static function getRestaurant($id)
    {
        $restaurant = Restaurant::where('user_id', $id)->first();
        return $restaurant_id = $restaurant->id;
    }
}
