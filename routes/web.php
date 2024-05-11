<?php

use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//slider route curd
Route::get('slider', [SliderController::class, 'index'])->name('sliders');
Route::get('slider-add',[SliderController::class, 'create'])->name('slider.create');
Route::post('slider-store', [SliderController::class,'store'])->name('slider.store');
Route::get('slider-edit/{id}',[SliderController::class, 'edit']);
Route::post('slider-update/{id}', [SliderController::class, 'update']);
Route::get('slider-delete/{id}',[SliderController::class, 'delete']);


//blog route
Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog-add',[BlogController::class, 'create'])->name('blog.create');
Route::post('blog-store', [BlogController::class,'store'])->name('blog.store');
Route::get('blog-edit/{id}',[BlogController::class, 'edit']);
Route::post('blog-update/{id}', [BlogController::class, 'update']);
Route::get('blog-delete/{id}',[BlogController::class, 'delete']);

//about route
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('about-add',[AboutController::class, 'create'])->name('about.create');
Route::post('about-store', [AboutController::class,'store'])->name('about.store');
Route::get('about-edit/{id}',[AboutController::class, 'edit']);
Route::post('about-update/{id}', [AboutController::class, 'update']);
Route::get('about-delete/{id}',[AboutController::class, 'delete']);




//website
Route::get('/', [WebsiteController::class, 'home'])->name('home');

Auth::routes();

Route::get('auth/dashboard',[DashboardController::class, 'dashboard'])->name('auth.dashboard')->middleware('auth');