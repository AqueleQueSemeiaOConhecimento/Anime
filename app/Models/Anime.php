<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $casts = [
        'genero' => 'array',
        'generos_pesquisados' => 'array'
    ];

    protected $dates = ['date'];

    public function episodeos() {
        return $this->hasMany('App\Models\Episodeo');
    }
}
