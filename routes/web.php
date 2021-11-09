<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\MainController;
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

Route::get('/', [homeController::class, 'index'] )->name('main');
Route::get('/kateqoriyalar/mobil-cihazlar', function (){
    return view('kateqoriya');
})->name('kateqoriya.mobil');


//JetStream
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::resource('categories', CategoryController::class);
