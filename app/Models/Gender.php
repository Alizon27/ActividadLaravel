<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
    use HasFactory;

    protected $table = "genders";

    protected $fillable = [
        'name'
    ];

    // Relación: un género tiene muchos superhéroes
    public function superheroes()
    {
        return $this->hasMany(Superhero::class);
    }
}

