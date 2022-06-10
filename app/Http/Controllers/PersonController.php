<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index() {
        return Person::all();
    }

    public function show(Person $person) {
        return $person;
    }
}
