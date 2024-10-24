<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MinijuegoController;
use App\Http\Controllers\RankingsController;

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
    return redirect()->route('home');
});
Route::get('/home', [MinijuegoController::class, 'index'])->name('home');
Route::get('/SimonDice', [MinijuegoController::class, 'simonDice'])->name('SimonDice');
Route::get('/SolarSystem', function () {
    return view('solarsystem');
})->name('solarsystem');
Route::post('/guardar-puntaje', [MinijuegoController::class, 'guardarPuntaje'])->name('guardar.puntaje');
Route::get('/rankings', [RankingsController::class, 'index'])->name('rankings');

Auth::routes();


