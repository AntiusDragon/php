<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MechanicController AS M;

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

// Mechanics CRUD Group
Route::prefix('mechanics')->name('mechanics-')->group(function () {
    Route::get('/', [M::class, 'index'])->name('index');
    Route::get('/create', [M::class, 'create'])->name('create'); // kreito rodimas
    Route::post('/', [M::class, 'store'])->name('store'); // storinimas
    Route::get('/{mechanic}', [M::class, 'show'])->name('show'); // vieno mechaniko rodimas
    Route::get('/{mechanic}/edit', [M::class, 'edit'])->name('edit'); // mechaniko editinimo rodimas
    Route::put('/{mechanic}', [M::class, 'update'])->name('update'); // editinimas
    Route::get('/{mechanic}/delete', [M::class, 'delete'])->name('delete'); // delete konfirmo rodimas
    Route::delete('/{mechanic}', [M::class, 'destroy'])->name('destroy'); // istrina
});

// Authentication Routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
