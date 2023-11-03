<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::prefix('admin')->group(function () {
        //update user info
        Route::post('update', [ProfileController::class, 'updateData'])->name('admin#update');
        //change password page
        Route::get('changePassword', [ProfileController::class, 'changePasswordPage'])->name('admin#changePaswword');
        Route::post('changePassword', [ProfileController::class, 'adminChangePassword'])->name('admin#passwordChange');
        //admin list page
        Route::get('list', [ProfileController::class, 'index'])->name('admin#list');
        //admin delete
        Route::get('delete/{id}', [ProfileController::class, 'deleteAccount'])->name('admin#deleteAccount');
        //admin list search
        Route::post('list', [ProfileController::class, 'adminListSearch'])->name('admin#listSearch');

    });
//category
    Route::prefix('category')->group(function () {
        //category list page
        Route::get('list', [CategoryController::class, 'index'])->name('category#list');
        //category create page
        Route::post('create', [CategoryController::class, 'createCategory'])->name('category#create');
        //category delete page
        Route::get('delete{id}', [CategoryController::class, 'categoryDelete'])->name('category#delete');
        //category search
        Route::post('category/search', [CategoryController::class, 'categorySearch'])->name('category#search');
        //category edit
        Route::get('editPage/{id}', [CategoryController::class, 'categoryeditPage'])->name('category#editPage');
        //category update
        Route::post('category/update', [CategoryController::class, 'categoryUpdate'])->name('category#update');

    });

//post
//post
    Route::get('post', [PostController::class, 'index'])->name('admin#post');
    Route::post('admin/createPost', [PostController::class, 'createPost'])->name('admin#createPost');
    Route::get('post/delete/{id}', [PostController::class, 'postDelete'])->name('admin#deletePost');
    Route::get('post/editpage/{id}', [PostController::class, 'postEditPage'])->name('admin#postEdit');
    Route::post('admin/updatePost', [PostController::class, 'updatePost'])->name('admin#updatePost');

});