<?php

use App\Http\Controllers\CatController;
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

Route::get('/', function () {
    return view('dashboard');
});

Route::controller(CatController::class, function () {
    Route::post('cat/store', 'store')->name('store.cat');
    Route::post('cat/update/{id}', 'update')->name('update.cat');
    Route::post('cat/delete/{id}', 'delete')->name('delete.cat');
    Route::get('cat/edit/{id}', 'edit')->name('edit.cat');
});
