<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //category search api
    public function categorySearch(Request $request)
    {
        $category = Category::select('posts.*')
            ->join('posts', 'categories.id', 'posts.category_id')
            ->where('categories.title', 'like', '%' . $request->key . '%')->get();
        return response()->json([
            'result' => $category,
        ]);
    }
}