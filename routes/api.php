<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InformationController;

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

Route::get('informations', [InformationController::class,'index']);
Route::post('informations', [InformationController::class,'store']);

Route::get('informations/{id}', [InformationController::class,'show']);
Route::get('informations/{id}/edit', [InformationController::class,'edit']);
Route::put('informations/{id}/update', [InformationController::class,'update']);

Route::delete('informations/{id}/delete', [InformationController::class,'delete']);