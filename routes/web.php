<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BegroetingController;
use App\Http\Controllers\DashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------x  ----
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/warehouse', function () {
    return view('warehouse');
});
Route::get('/orders', function () {
    return view('orders');
})->name('orders');

Route::get('/products', function () {
    return view('products');
})->name('products');
// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', function () {
//  return view('dashboard');
//})->middleware(['auth'])->name('dashboard');


Route::get('/warehouse', function () {
  return view('warehouse');
})->name('warehouse');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
