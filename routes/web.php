<?php

use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//   //  auth()->logout();
//     return 'home';
// });

//slider route curd
Route::get('slider', [SliderController::class, 'index'])->name('sliders');
Route::post('slider-store', [SliderController::class,'store'])->name('slider.store');
Route::get('slider-edit',[SliderController::class, 'edit'])->name('slider.edit');
Route::put('slider-update', [SliderController::class, 'update'])->name('slider.update');
Route::delete('slider-delete', [SliderController::class, 'delete'])->name('slider.delete');


//blog route
Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::post('blog-store', [BlogController::class, 'store'])->name('blog.store');
Route::get('blog-edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('blog-update', [BlogController::class, 'update'])->name('blog.update');
Route::delete('blog-delete', [BlogController::class, 'delete'])->name('blog.delete');

//about route
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::post('about-store', [AboutController::class,'store'])->name('about.store');
Route::get('about-edit', [AboutController::class, 'edit'])->name('about.edit');
Route::put('about-update', [AboutController::class, 'update'])->name('about.update');
Route::delete('about-delete',[AboutController::class, 'delete'])->name('about.delete');


//website
Route::get('/', [WebsiteController::class, 'home'])->name('home');


Route::get('auth/dashboard',[DashboardController::class, 'dashboard'])->name('auth.dashboard')->middleware('auth');

Auth::routes();


