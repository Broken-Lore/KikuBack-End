<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scene;
use App\Models\Interaction;

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

    public function interactions(){
        return $this->hasMany(Interaction::class);
    }
}
