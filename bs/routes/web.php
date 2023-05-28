<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeautySalonController as BSC;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('back')->name('back-')->group(function () {
    Route::get('/', [BSC::class, 'index'])->name('index');
    Route::get('/create', [BSC::class, 'create'])->name('create');
    Route::post('/store', [BSC::class, 'store'])->name('store');
    Route::get('/{beautySalon}', [BSC::class, 'show'])->name('show');
    Route::get('/edit/{beautySalon}', [BSC::class, 'edit'])->name('edit');
    Route::put('/edit/{beautySalon}', [BSC::class, 'update'])->name('update');
    Route::delete('/delete/{beautySalon}', [BSC::class, 'destroy'])->name('delete');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
