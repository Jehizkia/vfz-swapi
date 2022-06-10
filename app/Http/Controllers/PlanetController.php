<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    public function index() {
        return Planet::all();
    }

    public function show(Planet $planet) {
        return [
            'detail' => $planet,
            'species' => $planet->species()->get(),
            'people' => $planet->people()->get()
        ];
    }
}
