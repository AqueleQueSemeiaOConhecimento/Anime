<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodeo extends Model
{
    use HasFactory;

    protected $table = 'episodeos';

    public function anime() {
        return $this->belongsTo(Anime::class, 'anime_id');
    }

    protected $fillable = ['title', 'description', 'video'];
}
