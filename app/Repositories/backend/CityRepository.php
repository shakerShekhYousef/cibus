<?php


namespace App\Repositories\backend;


use App\Events\Backend\City\CityCreated;
use App\Events\Backend\City\CityUpdated;
use App\Models\City;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CityRepository extends BaseRepository
{
    public function model()
    {
        return City::class;
    }

    public function create(array $data): City
    {
        // Make sure it doesn't already exist
        return DB::transaction(function () use ($data) {
            $city = parent::create(['name' => strtolower($data['name'])]);

            if ($city) {
                event(new CityCreated($city));

                return $city;
            }
        });
    }

    public function update(City $city, array $data)
    {
        // If the name is changing make sure it doesn't already exist
        if ($city->name !== strtolower($data['name'])) {
            if ($this->cityExists($data['name'])) {
                throw new GeneralException('A city already exists with the name ' . $data['name']);
            }
        }
        return DB::transaction(function () use ($city, $data) {
            if ($city->update([
                'name' => strtolower($data['name']),
            ])) {
                event(new CityUpdated($city));

                return $city;
            }
        });
    }

    protected function cityExists($name): bool
    {
        return $this->model
                ->where('name', strtolower($name))
                ->count() > 0;
    }
}
