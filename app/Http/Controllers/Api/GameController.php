<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Scene;
use App\Models\Sound;

class GameController extends Controller
{
    public function randomSound($id)
    {
        $scene = Scene::find($id);

        $sounds = $scene->sounds->all();

        $randomIndex = array_rand($sounds);

        $randomSound = $sounds[$randomIndex];

        if ($randomSound) {
            return response()->json($randomSound, 200);

            $this->CompareSounds($randomSound->id);
        }
    }
}
