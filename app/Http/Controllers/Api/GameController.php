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

        if(!$scene){
            return response()->json("Scene not found", 404);

        }
        $sounds = $scene->sounds->all();

        if(!$sounds){
            return response()->json("Sounds not found", 404);
        }

        $randomIndex = array_rand($sounds);

        $randomSound = $sounds[$randomIndex];

        if ($randomSound) {
            return response()->json($randomSound, 200);

            $this->CompareSounds($randomSound->id);
        }
    }

    public function soundsMatch(Request $request){

        $randomSoundId = $request->randomSoundId;
        $clickedSoundId = $request->clickedSoundId;

        if($randomSoundId == $clickedSoundId){
            return response()->json(true, 302);
        }else{
            return response()->json(false, 404);
        }
    }
}
