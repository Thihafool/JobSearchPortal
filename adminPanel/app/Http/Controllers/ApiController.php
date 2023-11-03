<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //get all post api
    public function allPost()
    {
        $post = Post::get();
        return response()->json([
            'status' => 'success',
            'post' => $post,
        ]);
    }

    //get all category api
    public function getAllCategory()
    {
        $category = Category::select('id', 'title', 'description')->get();
        return response()->json([
            'category' => $category,
        ]);
    }
    //post search api
    public function postSearch(Request $request)
    {
        $post = Post::where('title', 'like', '%' . $request->key . '%')->get();
        return response()->json([
            'responseData' => $post,
        ]);
    }
    //postDetail api
    public function postDetails(Request $request)
    {
        $id = $request->postId;
        $post = Post::where('id', $id)->first();

        return response()->json([
            'post' => $post,
        ]);
    }

}