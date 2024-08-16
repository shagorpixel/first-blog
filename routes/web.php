<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactmsgController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\userController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[frontendController::class,'home'])->name('homepage');
Route::get('/about',[frontendController::class,'about'])->name('aboutpage');
Route::get('/contact',[frontendController::class,'contact'])->name('contactpage');
Route::get('/category/{slug}',[frontendController::class,'categpry'])->name('categorypage');
Route::get('/tag/{slug}',[frontendController::class,'tag'])->name('tagpage');
Route::get('/post/{slug}',[frontendController::class,'postpage'])->name('postpage');


//admin routing


Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){

    Route::get('/dashboard',[dashboardcontroller::class,'index'])->name('adminpage');
    Route::get('/',[dashboardcontroller::class,'index']);
    Route::resource('/category',CategoryController::class);
    Route::resource('/tag',TagController::class);
    Route::resource('/post',PostController::class);
    Route::resource('/user',userController::class);
    Route::get('/profile',[userController::class,'profile'])->name('profile.show');

    //Setting Route
    Route::get('/setting',[SettingController::class,'edit'])->name('setting.index');
    Route::post('/setting/{setting}',[SettingController::class,'update'])->name('setting.update');

    //Contact Message Route
    Route::get('/message',[ContactmsgController::class,'index'])->name('message.index');
    Route::get('/message/{message}',[ContactmsgController::class,'show'])->name('message.show');
    Route::delete('/message/{message}',[ContactmsgController::class,'destroy'])->name('message.destroy');

});

//Contact Message Route
Route::post('/contact',[ContactmsgController::class,'store'])->name('contactmsg.store');
