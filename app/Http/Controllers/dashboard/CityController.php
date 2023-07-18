<?php

namespace App\Http\Controllers\dashboard;

use App\Events\Backend\City\CityDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\city\StoreCityRequest;
use App\Http\Requests\backend\city\UpdateCityRequest;
use App\Models\City;
use App\Repositories\backend\CityRepository;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository=$cityRepository;
    }

    public function index()
    {
        //get all cities
        $cities = City::all();
        //return view
        return view('dashboard.cities.index', compact('cities'));
    }


    public function create()
    {
        return view('dashboard.cities.create');
    }


    public function store(StoreCityRequest $request)
    {
        $this->cityRepository->create($request->only(
            'name'
        ));

        session()->flash('success',__('alerts.backend.cities.created'));
        return redirect()->route('cities.index');
    }

    public function show($id)
    {
        //get al cities
        $city = City::findOrFail($id);
        //return view
        return view('dashboard.cities.show', compact('city'));
    }


    public function edit($id)
    {
        //get al cities
        $city = City::findOrFail($id);
        //return view
        return view('dashboard.cities.edit', compact('city'));
    }


    public function update(UpdateCityRequest $request, $id)
    {
        //find city
        $city = City::findOrFail($id);
        //update city
        $this->cityRepository->update($city,$request->only(
           'name'
        ));
        //return view
        session()->flash('success',__('alerts.backend.cities.updated'));
        return redirect()->route('cities.index');
    }


    public function destroy($id)
    {
        //find role
        $city=City::findOrFail($id);
        //delete role
        $city->delete();
        //event delete role
        event(new CityDeleted($city));
        session()->flash('success', __('alerts.backend.cities.deleted'));
        return redirect()->route('cities.index');
    }
}
