<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('tutorial/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'ViweCategoryPost']);
Route::get('/tutorial/{category_slug}/{post_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'ViewPost']);

//comment routes
Route::post('comments',[App\Http\Controllers\Frontend\CommentController::class,'store']);
Route::post('/delete-comment',[App\Http\Controllers\Frontend\CommentController::class,'destroy']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class,'index']);
    Route::get('categories', [App\Http\Controllers\Admin\CategoriesController::class,'index']); 
    Route::get('add-categories', [App\Http\Controllers\Admin\CategoriesController::class,'create']); 
    Route::post('add-categories', [App\Http\Controllers\Admin\CategoriesController::class,'store']); 
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoriesController::class,'edit']); 
    Route::put('update-categories/{category_id}', [App\Http\Controllers\Admin\CategoriesController::class,'update']); 
    Route::get('delete-categories/{category_id}', [App\Http\Controllers\Admin\CategoriesController::class,'delete']);

    Route::get('posts', [App\Http\Controllers\Admin\PostController::class,'index']);
    Route::get('add-post',[App\Http\Controllers\Admin\PostController::class,'create']);
    Route::post('add-post', [App\Http\Controllers\Admin\PostController::class,'store']);
    Route::get('post/{post_id}', [App\Http\Controllers\Admin\PostController::class,'edit']); 
    Route::put('update-post/{post_id}', [App\Http\Controllers\Admin\PostController::class,'update']); 
    Route::get('delete-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'delete']);

    Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);
    Route::get('users/{user_id}',[App\Http\Controllers\Admin\UserController::class,'edit']);
    Route::put('update-user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'update']);

    Route::get('settings',[App\Http\Controllers\Admin\SettingController::class,'index']);
    Route::post('settings',[App\Http\Controllers\Admin\SettingController::class,'savedata']);

});