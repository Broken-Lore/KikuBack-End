<?php

namespace App\Http\Controllers\Api;

use App\Models\Sound;
use Illuminate\Http\Request;

class SoundController extends Controller
{

    public function index(){
        $sounds = Sound::all();

        if($sounds){
            return response()->json($sounds, 200);
        }
    }
}
