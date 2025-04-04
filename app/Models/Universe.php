<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Universe extends Model
{
    use HasFactory;

    protected $table = "universes";

    protected $fillable = [
        'name'
    ];

    // Relación: un universo tiene muchos superhéroes
    public function superheroes()
    {
        return $this->hasMany(Superhero::class);
    }
}

