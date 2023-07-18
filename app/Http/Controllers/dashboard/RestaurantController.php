<?php

namespace App\Http\Controllers\dashboard;

use App\Events\Backend\Restaurant\RestaurantCreated;
use App\Events\Backend\Restaurant\RestaurantDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\restaurant\StoreRestaurantRequest;
use App\Http\Requests\backend\restaurant\UpdateRestaurantRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Restaurant;
use App\Models\User;
use App\Repositories\backend\RestaurantRepository;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public $restaurantRepository;

    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function index()
    {
        $restaurants = Restaurant::where('status',1)->get();
        return view('dashboard.restaurants.index', compact('restaurants'));
    }

    public function restaurantRequests()
    {
        $restaurants = Restaurant::where('status',0)->get();
        return view('dashboard.restaurants.restaurantRequests', compact('restaurants'));
    }

    public function activeRestaurant($id){
        $restaurant=Restaurant::findOrFail($id);
        $this->restaurantRepository->active($restaurant);
        session()->flash('success', __('alerts.backend.restaurants.activated'));
        return redirect()->route('restaurants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $categories = Category::where('model','restaurant')->get();
        return view('dashboard.restaurants.create', compact('cities', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->restaurantRepository->create($request->only(
            'owner_name',
            'owner_email',
            'restaurant_name',
            'address',
            'latitude',
            'longitude',
            'status',
            'logo',
            'description',
            'city_id',
            'category_id',
            'user_id'
        ));
        session()->flash('success', __('alerts.backend.restaurants.created'));
        return redirect()->route('restaurants.index');
    }

    public function update(UpdateRestaurantRequest $request, $id)
    {
        //find restaurant
        $restaurant = Restaurant::findOrFail($id);
        //update restaurant
        $this->restaurantRepository->update($restaurant, $request->only(
            'owner_name',
            'owner_email',
            'restaurant_name',
            'address',
            'latitude',
            'longitude',
            'status',
            'logo',
            'description',
            'city_id',
            'category_id',
            'user_id'
        ));
        session()->flash('success', __('alerts.backend.restaurants.updated'));
        if (auth()->user()->isAdmin()){
            return redirect()->route('restaurants.index');
        }elseif (auth()->user()->isRestaurant()){
            return redirect()->back();
        }

    }


    public function show($id)
    {
        //find restaurant
        $restaurant = Restaurant::findOrFail($id);
        //return show view
        return view('dashboard.restaurants.show', compact('restaurant'));
    }

    public function edit($id)
    {
        //find restaurant
        $restaurant = Restaurant::findOrFail($id);
        //cities
        $cities = City::all();
        //categories
        $categories = Category::where('model','restaurant')->get();
        //return edit view
        return view('dashboard.restaurants.edit', compact('restaurant', 'cities', 'categories'));
    }

    public function destroy($id)
    {
        //find restaurant
        $restaurant = Restaurant::findOrFail($id);
        //delete restaurant
        $restaurant->delete();
        //event delete restaurant
        event(new RestaurantDeleted($restaurant));

        session()->flash('success', __('alerts.backend.restaurants.deleted'));
        return redirect()->route('restaurants.index');
    }
}
