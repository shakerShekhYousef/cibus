<?php

namespace App\Http\Controllers\dashboard;

use App\Events\Backend\Category\CategoryDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\category\StoreCategoryRequest;
use App\Http\Requests\backend\category\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Restaurant;
use App\Repositories\backend\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository=$categoryRepository;
    }

    public function index()
    {
        //get all categories
        if (auth()->user()->isAdmin()){
            $categories=Category::where('model','restaurant')->get();
        }elseif (auth()->user()->isRestaurant()){
            $categories=Category::where([
                ['model','dish'],
                ['restaurant_id',Restaurant::getRestaurant(auth()->user()->id)]
            ])->get();
        }

        //return view categories
        return view ('dashboard.categories.index',compact('categories'));
    }


    public function create()
    {
        return view ('dashboard.categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepository->create($request->only(
            'name',
            'restaurant_id',
            'model'
        ));
        session()->flash('success',__('alerts.backend.categories.created'));
        return redirect()->route('categories.index');
    }
    public function show($id)
    {
        //find category
        $category=Category::findOrFail($id);
        //return view
        return view('dashboard.categories.show',compact('category'));
    }


    public function edit($id)
    {
        //find category
        $category=Category::findOrFail($id);
        //return view
        return view('dashboard.categories.edit',compact('category'));
    }


    public function update(UpdateCategoryRequest $request, $id)
    {
        //find category
        $category=Category::findOrFail($id);
        $this->categoryRepository->update($category,$request->only(
            'name'
        ));
        session()->flash('success',__('alerts.backend.categories.updated'));
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        //find category
        $category=Category::findOrFail($id);
        //delete category
        $category->delete();
        //event delete role
        event(new CategoryDeleted($category));

        session()->flash('success', __('alerts.backend.categories.deleted'));
        return redirect()->route('categories.index');
    }
}
