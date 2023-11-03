<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct category list page
    public function index()
    {
        $category = Category::get();

        return view('admin.category.index', compact('category'));
    }
    //create category
    public function createCategory(Request $request)
    {
        $this->validationCheck($request);
        $data = $this->getCategoryData($request);

        $category = Category::create($data);
        return back();
    }
    //delete category
    public function categoryDelete($id)
    {
        Category::where('id', $id)->delete();
        return back()->with(['deleteSuccses' => 'category deleted successfully']);

    }
    //category searching
    public function categorySearch()
    {
        $category = Category::when(request('categorySearch'), function ($query) {
            $query->where('title', 'like', '%' . request('categorySearch') . '%');

        })->get();

        return view('admin.category.index', compact('category'));

    }
    //category update
    public function categoryUpdate(Request $request)
    {

        $id = $request->categoryId;
        $updateData = $this->updateCategory($request);

        Category::where('id', $id)->update($updateData);
        return redirect()->route('category#list');
    }

    //category edit page
    public function categoryeditPage($id)
    {
        $category = Category::get();

        $updateData = Category::where('id', $id)->first();

        return view('admin.category.edit', compact('updateData', 'category'));

    }

    //get category data
    private function getCategoryData($request)
    {
        return [
            'title' => $request->categoryName,
            'description' => $request->categoryDescription,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

    }
    //create category validationCheck
    private function validationCheck($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|min:4',
            // 'categoryDescription' => 'required',
        ])->validate();
    }

    //get category update data
    private function updateCategory($request)
    {
        return [
            'title' => $request->categoryName,
            'description' => $request->categoryDescription,
            'updated_at' => Carbon::now(),
        ];
    }
}