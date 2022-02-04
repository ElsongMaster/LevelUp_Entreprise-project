<?php

use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\MessagerieController;
use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('entreprises', EntrepriseController::class)->middleware('auth');
Route::resource('taches', TacheController::class)->middleware('auth');
Route::get('/chat',[MessagerieController::class,'index'])->middleware('auth');
Route::post('/message/admin',[MessagerieController::class,'store'])->name('messages.store')->middleware('auth');