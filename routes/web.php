<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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
    $res = Http::get('https://swapi.dev/api/species/1')->object();
    dd($res);
    return view('welcome');
});

Route::get('/p', function () {
    $planet = \App\Models\Planet::find(40);
    dd($planet->species);
    return view('welcome');
});
