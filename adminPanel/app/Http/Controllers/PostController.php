<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //direct post list page
    public function index()
    {
        $post = Post::get();
        $category = Category::get();

        return view('admin.post.index', compact('category', 'post'));
    }
    //post create
    public function createPost(Request $request)
    {
        $this->postValidationCheck($request);
        $data = $this->getPostData($request);

        if (!empty($request->postImage)) {
            $fileName = uniqid() . $request->file('postImage')->getClientOriginalName();

            $request->file('postImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;

        } else {
            $data = $this->getPostData($request);
            $data['image'] = null;
        }
        Post::create($data);
        return back();
    }
    //post delete with image
    public function postDelete($id)
    {
        $PostData = Post::where('id', $id)->first();
        $dbImageName = $PostData['image'];

        Post::where('id', $id)->delete();
        if ($dbImageName) {
            Storage::delete('public/' . $dbImageName);
        }
        return back();
    }

    //direct edit page
    public function postEditPage($id)
    {
        $postData = Post::where('id', $id)->first();
        $category = Category::get();

        $post = Post::get();
        return view('admin.post.update', compact('postData', 'category', 'post'));
    }
    //update post
    public function updatePost(Request $request)
    {
        $id = $request->postId;
        $data = $this->getPostData($request);

        if ($request->hasFile('postImage')) {

            $dbOldImage = Post::select('image')->where('id', $id)->first();

            if ($dbOldImage) {
                Storage::delete('public/' . $dbOldImage);
            }
            $fileName = uniqid() . $request->file('postImage')->getClientOriginalName();
            $request->file('postImage')->storeAs('public/' . $fileName);
            $data['image'] = $fileName;
        }

        Post::where('id', $id)->update($data);
        return back();
    }

    //post validation check
    private function postValidationCheck($request)
    {
        Validator::make($request->all(), [
            'postTitle' => 'required',
            'postDescription' => 'required',
            'postCategory' => 'required',
        ])->validate();
    }
    //get post data
    private function getPostData($request)
    {
        return [
            'title' => $request->postTitle,
            'description' => $request->postDescription,
            'category_id' => $request->postCategory,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}