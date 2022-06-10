<?php

use App\Models\Person;
use App\Models\Planet;
use App\Models\Specie;
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
    $people = cache()->remember('people', now()->addDay(), function () {
        return Person::all();
    });

    return view('index', ['people' => $people]);
})->name('index');

Route::get('/planets', function () {
    $planets = cache()->remember('planets', now()->addDay(), function () {
        return Planet::all();
    });

    return view('show-planets', ['planets' => $planets]);
})->name('planets');

Route::get('/species', function () {
    $species = cache()->remember('species', now()->addDay(), function () {
        return Specie::all();
    });

    return view('show-species', ['species' => $species]);
})->name('species');

Route::get('/people/{id}', function ($id) {
    return view('show-person', ['person' => Person::findOrFail($id)]);
})->name('people');

