<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\AuthController;

//login register token
Route::post('login', [AuthController::class, 'login']);
Route::post('user/register', [AuthController::class, 'register']);
//post api
Route::get('allPost', [ApiController::class, 'allPost']);
Route::post('postSearch', [ApiController::class, 'postSearch']);
Route::post('postDetails', [ApiController::class, 'postDetails']);
//category api
Route::get('allCategory', [ApiController::class, 'getAllCategory']);
Route::post('category/search', [CategoryController::class, 'categorySearch']);