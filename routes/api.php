<?php

use App\Http\Controllers\ApiControllers\AuthController;
use App\Http\Controllers\ApiControllers\EntrepriseApiController;
use App\Http\Controllers\EntrepriseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route public
Route::post('v1/register/user',[AuthController::class,'register']);
Route::post('v1/login/user',[AuthController::class,'login']);
Route::get('v1/users',[AuthController::class,'allUser']);


// Route privée
Route::group(['middleware'=>['auth:sanctum']],function(){
Route::post('/v1/register/profilecompany',[EntrepriseApiController::class,'register']);
Route::post('/v1/register/personnecontact',[EntrepriseApiController::class,'register2']);
});
