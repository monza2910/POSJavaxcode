<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\OutletMenuController;

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
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard.layout.template');
})->name('dashboard');

Route::resource('category', CategoryController::class);
Route::resource('subcategory', SubCategoryController::class);
Route::resource('menu', MenuController::class);
Route::resource('outlet', OutletController::class);
Route::resource('outletmenu', OutletMenuController::class);
Route::get('/addoutlet/{id}',[OutletMenuController::class, 'addMenu'])->name('add.outletmenu');

