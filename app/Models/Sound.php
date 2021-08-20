<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scene;

class Sound extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'audio',
        'img'
    ];

    public function scene(){
        return $this->belongsTo(Scene::class);
    }
}
