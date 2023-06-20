<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeautySalonController as BSC;
use App\Http\Controllers\ServiceController as SC;
use App\Http\Controllers\SpecialistController as SPEC;
use App\Http\Controllers\BackController as BC;
use App\Http\Controllers\HomeController as HC;

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

Route::prefix('salon')->name('salon-')->group(function () {
    Route::get('/', [BSC::class, 'index'])->name('index')->middleware('role:admin|client');
    Route::get('/create', [BSC::class, 'create'])->name('create')->middleware('role:admin|client');
    Route::post('/store', [BSC::class, 'store'])->name('store')->middleware('role:admin|client');
    Route::get('/{beautySalon}', [BSC::class, 'show'])->name('show')->middleware('role:admin|client');
    Route::get('/edit/{beautySalon}', [BSC::class, 'edit'])->name('edit')->middleware('role:admin|client');
    Route::put('/edit/{beautySalon}', [BSC::class, 'update'])->name('update')->middleware('role:admin|client');
    Route::delete('/delete/{beautySalon}', [BSC::class, 'destroy'])->name('delete')->middleware('role:admin|client');
});

Route::prefix('service')->name('service-')->group(function () {
    Route::get('/', [SC::class, 'index'])->name('index')->middleware('role:admin|client');
    Route::get('/create', [SC::class, 'create'])->name('create')->middleware('role:admin|client');
    Route::post('/store', [SC::class, 'store'])->name('store')->middleware('role:admin|client');
    Route::get('/{service}', [SC::class, 'show'])->name('show')->middleware('role:admin|client');
    Route::get('/edit/{service}', [SC::class, 'edit'])->name('edit')->middleware('role:admin|client');
    Route::put('/edit/{service}', [SC::class, 'update'])->name('update')->middleware('role:admin|client');
    Route::delete('/delete/{service}', [SC::class, 'destroy'])->name('delete')->middleware('role:admin|client');
});

Route::prefix('specialist')->name('specialist-')->group(function () {
    Route::get('/', [SPEC::class, 'index'])->name('index')->middleware('role:admin|client');
    Route::get('/create', [SPEC::class, 'create'])->name('create')->middleware('role:admin|client');
    Route::post('/store', [SPEC::class, 'store'])->name('store')->middleware('role:admin|client');
    Route::get('/{specialist}', [SPEC::class, 'show'])->name('show')->middleware('role:admin|client');
    Route::get('/salons', [SPEC::class, 'salons'])->name('salons')->middleware('role:admin|client'); 
    Route::get('/salon-name', [SPEC::class, 'salonName'])->name('salon-name')->middleware('role:admin|client');
    Route::put('/vote/{specialist}', [SPEC::class, 'vote'])->name('vote')->middleware('role:admin|client');
    Route::get('/edit/{specialist}', [SPEC::class, 'edit'])->name('edit')->middleware('role:admin|client');
    Route::put('/edit/{specialist}', [SPEC::class, 'update'])->name('update')->middleware('role:admin|client');
    Route::delete('/delete/{specialist}', [SPEC::class, 'destroy'])->name('delete')->middleware('role:admin|client');
});

Route::prefix('back')->name('back-')->group(function () {
    Route::get('/', [BC::class, 'index'])->name('index')->middleware('role:admin');
    // Route::get('/create', [SPEC::class, 'create'])->name('create');
    // Route::post('/store', [SPEC::class, 'store'])->name('store');
    // Route::get('/{specialist}', [SPEC::class, 'show'])->name('show');
    // Route::get('/salons', [SPEC::class, 'salons'])->name('salons'); 
    // Route::get('/salon-name', [SPEC::class, 'salonName'])->name('salon-name');
    Route::put('/vote/{specialist}', [BC::class, 'voteFront'])->name('vote');
    Route::get('/edit/{beautySalon}', [BC::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('/edit/{beautySalon}', [BC::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/delete/{beautySalon}', [BC::class, 'destroy'])->name('delete')->middleware('role:admin');
});

Auth::routes();

Route::prefix('home')->name('home-')->group(function () {
Route::get('/home', [HC::class, 'index'])->name('home');
});