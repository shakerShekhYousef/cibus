<?php


namespace App\Repositories\frontend;


use App\Events\Backend\Restaurant\RestaurantActivated;
use App\Events\Backend\Restaurant\RestaurantCreated;
use App\Exceptions\GeneralException;
use App\Models\Restaurant;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class RestaurantRepository extends BaseRepository
{

    public function model()
    {
        return Restaurant::class;
    }

    public function createRequest(array $data) : Restaurant{
        return DB::transaction(function () use ($data) {
            $restaurant = parent::create([
                'owner_name' => $data['owner_name'],
                'owner_email' => $data['owner_email'],
                'restaurant_name' => $data['restaurant_name'],
                'address' => $data['address'],
                'status' => Restaurant::$DEFAULT_STATUS,
                'city_id' => $data['city_id'],
            ]);
            if ($restaurant) {
                event(new RestaurantCreated($restaurant));
                return $restaurant;
            }
        });
    }
}
