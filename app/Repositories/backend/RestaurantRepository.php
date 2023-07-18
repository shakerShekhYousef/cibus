<?php


namespace App\Repositories\backend;


use App\Events\Backend\Restaurant\RestaurantActivated;
use App\Events\Backend\Restaurant\RestaurantCreated;
use App\Events\Backend\Restaurant\RestaurantUpdated;
use App\Exceptions\GeneralException;
use App\Models\Restaurant;
use App\Models\Role;
use App\Models\User;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class RestaurantRepository extends BaseRepository
{
    public function model()
    {
        return Restaurant::class;
    }

    public function create(array $data): Restaurant
    {
        return DB::transaction(function () use ($data) {
            $restaurant = parent::create([
                'owner_name' => $data['owner_name'],
                'owner_email' => $data['owner_email'],
                'restaurant_name' => $data['restaurant_name'],
                'address' => $data['address'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'logo' => $this->UploadImage($data['logo'], $data['restaurant_name']),
                'status' => Restaurant::$DEFAULT_STATUS,
                'description' => $data['description'],
                'city_id' => $data['city_id'],
                'category_id' => $data['category_id'] !== null ? $data['category_id'] : null,
                'user_id' => auth()->user()->id

            ]);
            if ($restaurant) {
                event(new RestaurantCreated($restaurant));
                return $restaurant;
            }
        });
    }

    public function update(Restaurant $restaurant, array $data): Restaurant
    {
        return DB::transaction(function () use ($restaurant, $data) {
            if (isset($data['logo'])) {
                $restaurant->update([
                    'logo' => $this->UploadImage($data['logo'], $data['restaurant_name'])
                ]);
            } else {
                $restaurant->update([
                    'logo' => $restaurant->logo
                ]);
            }
            if ($restaurant->update([
                'owner_name' => $data['owner_name'],
                'owner_email' => $data['owner_email'],
                'restaurant_name' => $data['restaurant_name'],
                'address' => $data['address'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'description' => $data['description'],
                'city_id' => $data['city_id'],
                'category_id' => $data['category_id'],
            ])) {
                return $restaurant;
            }
            if ($restaurant) {
                event(new RestaurantUpdated($restaurant));
                return $restaurant;
            }
        });
    }

    public function active(Restaurant $restaurant): Restaurant
    {
        if ($restaurant->status) {
            throw new GeneralException(__('exceptions.backend.restaurants.already_activated'));
        }
        $user=User::create([
            'full_name'=>$restaurant->owner_name,
            'email'=>$restaurant->owner_email,
            'password'=>Hash::make($this->generatePassword($restaurant->restaurant_name)),
            'email_verified_at'=>Carbon::now(),
            'role_id'=>Role::restaurantRole(),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        $restaurant->status = 1;
        $restaurant->user_id=$user->id;
        $activated = $restaurant->save();
        if ($activated) {
            event(new RestaurantActivated($activated));

//            // Let user know their account was approved
//            if (config('access.users.requires_approval')) {
//                $user->notify(new UserAccountActive);
//            }

            return $restaurant;
        }

        throw new GeneralException(__('exceptions.backend.restaurants.cant_active'));
    }

    //generate password
    public function generatePassword($restaurantName){
        //rand function
        $random=rand(1000000,2000000);
        //password
        $password=$restaurantName.'_'.$random.'CIBUS';
        //return password
        return $password;
    }

    // Upload image function
    public function UploadImage($image, $name)
    {
        //get file name with extention
        $filenameWithExt = $image->getClientOriginalName();
        //get just file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //GET EXTENTION
        $extention = $image->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extention;
        //upload image
        $path = $image->storeAs('public/images/restaurants/' . $name . '/', $fileNameToStore);
        return $fileNameToStore;
    }

}
