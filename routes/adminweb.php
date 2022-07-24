<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Category;
use App\Models\SubCategory;

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
    Route::get('/admin/password/change',[AdminController::class,'PasswordChange'])->name('admin.password.change');
    Route::post('/admin/password/update',[AdminController::class,'PasswordUpdate'])->name('admin.password.update');

    // category route
    Route::group(['prefix'=>'category'],function(){

        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
    });

    // subcategory Route
    Route::group(['prefix'=>'subcategory'],function(){

        Route::get('/',[SubcategoryController::class,'index'])->name('subcategory.index');
        Route::post('/store',[SubcategoryController::class,'store'])->name('subcategory.store');
        Route::get('/delete/{id}',[SubcategoryController::class,'destroy'])->name('subcategory.destroy');
        Route::get('/edit/{id}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
        Route::post('/update', [SubcategoryController::class, 'update'])->name('subcategory.update');
    });
    // Child Category Route

    Route::group(['prefix'=>'childcategory'],function(){

        Route::get('/',[ChildcategoryController::class,'index'])->name('childcategory.index');
        Route::post('/store',[ChildcategoryController::class,'store'])->name('childcategory.store');
        Route::get('/delete/{id}',[ChildcategoryController::class,'destroy'])->name('childcategory.delete');
        Route::get('/edit/{id}',[ChildcategoryController::class,'edit'])->name('childcategory.edit');
        Route::post('/update', [ChildcategoryController::class, 'update'])->name('childcategory.update');
    });
    // Brand Routes

    Route::group(['prefix'=>'brand'],function(){

        Route::get('/',[BrandController::class,'index'])->name('brand.index');
        Route::post('/store',[BrandController::class,'store'])->name('brand.store');
        Route::get('/delete/{id}',[BrandController::class,'destroy'])->name('brand.delete');
        Route::get('/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
        Route::post('/update', [BrandController::class, 'update'])->name('brand.update');

    });
    // Setting Routes
    Route::group(['prefix'=>'setting'],function(){

        //seo setting
        Route::group(['prefix'=>'seo'],function(){
            Route::get('/',[SettingController::class,'seo'])->name('seo.setting');
            Route::post('/update/{id}',[SettingController::class,'seoUpdate'])->name('seo.setting.update');

        });
        //seo setting
        Route::group(['prefix'=>'smtp'],function(){
            Route::get('/',[SettingController::class,'smtp'])->name('smtp.setting');
            Route::post('/update/{id}',[SettingController::class,'smtpUpdate'])->name('smtp.setting.update');

        });
    });



    // Route::group(['prefix' => 'setting'], function () {
    //     // seo setting
    //     Route::group(['prefix' => 'seo'], function () {
    //         Route::get('/', [SettingController::class, 'seo'])->name('seo.setting');
    //         Route::post('update/{id}', [SettingController::class, 'seoUpdate'])->name('seo.setting.update');
    //     });
        // smtp setting
        // Route::group(['prefix' => 'smtp'], function () {
        //     Route::get('/', [SettingController::class, 'smtp'])->name('smtp.setting');
        //     Route::post('update/{id}', [SettingController::class, 'smtpUpdate'])->name('smtp.setting.update');
        // });
        // website setting
        // Route::group(['prefix' => 'website'], function () {
        //     Route::get('/', [SettingController::class, 'website'])->name('website.setting');
        //     Route::post('update/{id}', [SettingController::class, 'websiteUpdate'])->name('website.setting.update');
        // });
        // page setting
        // Route::group(['prefix' => 'page'], function () {
        //     Route::get('/', [PageController::class, 'page'])->name('page.index');
        //     Route::get('/create', [PageController::class, 'create'])->name('page.create');
        //     Route::post('/store', [PageController::class, 'store'])->name('page.store');
        //     Route::get('/delete/{id}', [PageController::class, 'destroy'])->name('page.delete');
        //     Route::get('/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
        //     Route::post('/update/{id}', [PageController::class, 'update'])->name('page.update');
        // });


});
