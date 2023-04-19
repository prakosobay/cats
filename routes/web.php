<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\TypeController;
use App\Models\MasterType;
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

// Route::get('/', function () {
//     return view('dashboard');
// });


Route::controller(CatController::class)->group(function(){
    Route::post('cat/store', 'store')->name('store.cat');
    Route::post('cat/update/{id}', 'update')->name('update.cat');
    Route::post('cat/delete/{id}', 'delete')->name('delete.cat');
    Route::get('cat/edit/{id}', 'edit')->name('edit.cat');
    Route::get('cat/tambah', 'tambah')->name('tambah.cat');
    Route::get('/', 'index')->name('dashboard.cat');
    Route::get('cat/type', 'type_sum')->name('type.cat');
    Route::get('cat/food', 'food_sum')->name('food.cat');
    Route::post('cat/food', 'store_food_sum')->name('sumFood.cat');
    Route::get('cat/spend', 'spend_sum')->name('spend.cat');
});

Route::controller(TypeController::class)->group(function () {
    Route::get('type/table', 'table')->name('table.type');
    Route::get('type/edit/{id}', 'edit')->name('edit.type');
    Route::post('type/store', 'store')->name('store.type');
    Route::post('type/update/{id}', 'update')->name('update.type');
    Route::post('type/delete/{id}', 'delete')->name('delete.type');
});

Route::controller(FoodController::class)->group(function () {
    Route::get('food/table', 'table')->name('table.food');
    Route::get('food/edit/{id}', 'edit')->name('edit.food');
    Route::post('food/store', 'store')->name('store.food');
    Route::post('food/update/{id}', 'update')->name('update.food');
    Route::post('food/delete/{id}', 'delete')->name('delete.food');
});
