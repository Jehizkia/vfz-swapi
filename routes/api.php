<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\SpecieController;
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

Route::get('/people/{person}', [PersonController::class, 'show']);
Route::get('/planets/{planet}', [PlanetController::class, 'show']);
Route::get('/species/{specie}', [SpecieController::class, 'show']);
