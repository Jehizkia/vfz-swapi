<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function people() {
       return $this->hasMany(Person::class);
    }

    public function species() {
        return $this->hasMany(Specie::class);
    }
}
