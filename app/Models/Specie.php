<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function planet() {
        return $this->belongsTo(Planet::class);
    }

    public function people() {
        return $this->hasMany(Person::class);
    }
}
