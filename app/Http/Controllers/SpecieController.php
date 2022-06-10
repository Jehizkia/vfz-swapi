<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    public function index() {
        return Specie::all();
    }

    public function show(Specie $specie) {
        return [
            'detail' => $specie,
            'planet' => $specie->planet()->get(),
            'people' => $specie->people()->get()
        ];
    }
}
