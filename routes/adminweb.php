<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Category;

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

// onclick="event.preventDefault();
// document.getElementById('logout-form').submit();"

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');


Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'is_admin'],function () {

    Route::get('/admin/home',[AdminController::class,'admin'])->name('admin.home');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

    Route::group(['prefix'=>'category'],function(){

        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');

    });
});
