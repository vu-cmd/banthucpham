<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/detail', function () {
//     return view('detail');
// });
// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/foods', [FoodController::class, 'index']);
// Route::post('postSearch', [FoodController::class, 'postSearch'])->name('postSearch');
// Route::get('/foods', [FoodController::class, 'index'])->name('index');
Route::resource('foods',FoodController::class);
Route::post('postSearch', [FoodController::class, 'index'])->name('postSearch');
Route::get('admin', [AdminController::class, 'index'])->name('admin');

Route::get('/foods/{id}/edit', [FoodController::class, 'edit'])->name('foods.edit');
Route::put('/foods/{id}', [FoodController::class, 'update'])->name('foods.update');
// Route::get('/foods/{id}', [FoodController::class, 'detail'])->name('listfoods.detail');
// Route::get('foods/create',[FoodController::class,'create']->name('foods.create'));