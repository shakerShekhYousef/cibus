<?php


namespace App\Repositories\backend;


use App\Events\Backend\Dish\DishCreated;
use App\Events\Backend\Dish\DishUpdated;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class DishRepository extends BaseRepository
{
    public function model()
    {
        return Dish::class;
    }

    public function create(array $data): Dish
    {
        $restaurant_id=Restaurant::getRestaurant(auth()->user()->id);
        $dish=new Dish();
        $dish->name=$data['name'];
        $dish->image=$this->UploadImage($data['image'],$restaurant_id);
        $dish->restaurant_id=$restaurant_id;
        $dish->price=$data['price'];
        $dish->category_id=$data['category_id'];
        $dish->description=$data['description'];
        $dish->save();
        if ($dish) {
            event(new DishCreated($dish));
            return $dish;
        }

    }

    public function update(Dish $dish,array $data): Dish
    {
        $restaurant_id=Restaurant::getRestaurant(auth()->user()->id);
        $dish->name=$data['name'];
        if (isset($data['image'])) {
            $dish->image = $this->UploadImage($data['image'], $restaurant_id);
        }
        $dish->price=$data['price'];
        $dish->category_id=$data['category_id'];
        $dish->description=$data['description'];
        $dish->save();
        if ($dish) {
            event(new DishUpdated($dish));
            return $dish;
        }

    }

// Upload image function
    public function UploadImage($image, $restaurant_id)
    {
        //get restaurant
        $restaurant = Restaurant::where('id',$restaurant_id)->first();
        $restaurant_name = $restaurant->restaurant_name;
        //get file name with extention
        $filenameWithExt = $image->getClientOriginalName();
        //get just file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //GET EXTENTION
        $extention = $image->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extention;
        //upload image
        $path = $image->storeAs('public/images/dishes/' . $restaurant_name . '/', $fileNameToStore);
        return $fileNameToStore;
    }

}
