<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\ProfesorController;

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
    return view('auth.login');
});

/*
Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/empleado/create', [EmpleadoController::class,'create']);
*/

Route::resource('empleado',EmpleadoController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
    
});

Route::resource('idioma',IdiomaController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/idioma', [IdiomaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [IdiomaController::class, 'index'])->name('home');
});

Route::resource('profesor',ProfesorController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/profesor', [ProfesorController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [ProfesorController::class, 'index'])->name('home');
});
