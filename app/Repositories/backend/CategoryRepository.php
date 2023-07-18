<?php


namespace App\Repositories\backend;


use App\Events\Backend\Category\CategoryCreated;
use App\Events\Backend\Category\CategoryUpdated;
use App\Exceptions\GeneralException;
use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository
{
    public function model()
    {
        return Category::class;
    }
    public function create(array $data): Category
    {
        // Make sure it doesn't already exist
        return DB::transaction(function () use ($data) {
            $category = parent::create([
                'name' => strtolower($data['name']),
                'model'=>$data['model'],
                'restaurant_id'=>isset($data['restaurant_id']) ? $data['restaurant_id'] : null
            ]);

            if ($category) {
                event(new CategoryCreated($category));
                return $category;
            }
        });
    }

    public function update(Category $category, array $data)
    {
        return DB::transaction(function () use ($category, $data) {
            if ($category->update([
                'name' => strtolower($data['name']),
            ])) {
                event(new CategoryUpdated($category));
                return $category;
            }
        });
    }

}
