<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sound;
class Scene extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function sounds(){
        return $this->hasMany(Sound::class);
    }
}
