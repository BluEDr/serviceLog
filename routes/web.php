<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeService;
use App\Http\Controllers\VehicleServiceAndMore;

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

Route::any('/', [App\Http\Controllers\HomeService::class, 'index'])->name('index')->middleware('auth');
Route::any('/delete-vehicle/{id}', [App\Http\Controllers\HomeService::class, 'delete_vehicle'])->name('delete-vehicle')->middleware('auth');
Route::get('/vehicle-more/{id}', [App\Http\Controllers\VehicleServiceAndMore::class, 'vehicleMore'])->name('vehicle-more')->middleware('auth');
Route::any('/edit-vehicle/{id}', [App\Http\Controllers\VehicleServiceAndMore::class, 'editVehicle'])->name('edit-vehicle')->middleware('auth');
Route::any('/add-service/{id}', [App\Http\Controllers\VehicleServiceAndMore::class, 'addService'])->name('add-service')->middleware('auth');
Route::any('/fuel-consumption/{id}', [App\Http\Controllers\ManageFuel::class, 'fuel_consumption'])->name('fuel-consumption')->middleware('auth');
Route::any('/del-fuel/{id}', [App\Http\Controllers\ManageFuel::class, 'del_fuel_consumption'])->name('del-fuel-consumption')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
