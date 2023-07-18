<?php

namespace App\Http\Controllers\dashboard;

use App\Events\Backend\Dish\DishCreated;
use App\Events\Backend\Dish\DishDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\dish\StoreDishRequest;
use App\Http\Requests\backend\dish\UpdateDishRequest;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Repositories\backend\DishRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    public $dishRepository;

    public function __construct(DishRepository $dishRepository)
    {
        $this->dishRepository = $dishRepository;
    }

    public function index()
    {
        $restaurant_id=Restaurant::getRestaurant(auth()->user()->id);
        $dishes=Dish::where('restaurant_id',$restaurant_id)->get();
        return view('dashboard.dishes.index',compact('dishes'));
    }


    public function create()
    {
        $categories=Category::where([
            ['model','dish'],
            ['restaurant_id',Restaurant::getRestaurant(auth()->user()->id)]
        ])->get();
        return view('dashboard.dishes.create',compact('categories'));
    }


    public function store(StoreDishRequest $request)
    {
        $this->dishRepository->create($request->only(
            'name',
            'image',
            'restaurant_id',
            'description',
            'price',
            'category_id'
        ));

        session()->flash('success', __('alerts.backend.dishes.created'));
        return redirect()->route('dishes.index');

    }


    public function show($id)
    {
        $categories=Category::where([
            ['model','dish'],
            ['restaurant_id',Restaurant::getRestaurant(auth()->user()->id)]
        ])->get();
        $dish=Dish::findOrFail($id);
        return view('dashboard.dishes.show',compact('categories','dish'));
    }


    public function edit($id)
    {
        $categories=Category::where([
            ['model','dish'],
            ['restaurant_id',Restaurant::getRestaurant(auth()->user()->id)]
        ])->get();
        $dish=Dish::findOrFail($id);
        return view('dashboard.dishes.edit',compact('categories','dish'));
    }


    public function update(UpdateDishRequest $request, $id)
    {
        //find dish
        $dish=Dish::findOrFail($id);
        //update dish
        $this->dishRepository->update($dish,$request->only(
            'name',
            'restaurant_id',
            'image',
            'description',
            'price',
            'category_id',
            'restaurant_id'
        ));
        //return view
        session()->flash('success', __('alerts.backend.dishes.updated'));
        return redirect()->route('dishes.index');
    }


    public function destroy($id)
    {
        //find dish
        $dish=Dish::findOrFail($id);
        //delete dish
        $dish->delete();
        //event delete restaurant
        event(new DishDeleted($dish));
        session()->flash('success', __('alerts.backend.dishes.deleted'));
        return redirect()->route('dishes.index');
    }
}
