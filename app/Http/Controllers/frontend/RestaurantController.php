<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\restaurant\StoreRestaurantRequest;
use App\Models\City;
use App\Repositories\frontend\RestaurantRepository;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public $restaurantRepository;
    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository=$restaurantRepository;
    }

    public function index()
    {
        //
    }

    public function submitPage(){
        $cities=City::all();
        return view('frontend.submit-restaurant',compact('cities'));
    }

    public function create()
    {
        //
    }

    public function storeRequest(StoreRestaurantRequest $request)
    {
        $this->restaurantRepository->createRequest($request->only(
            'owner_name',
            'owner_email',
            'restaurant_name',
            'address',
            'city_id',
            'user_id'
        ));
        session()->flash('success', __('alerts.backend.restaurants.send_request'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
