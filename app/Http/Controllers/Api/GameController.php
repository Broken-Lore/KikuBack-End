<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Scene;
use App\Models\Sound;
use App\Models\Game;
use App\Models\User;


class GameController extends Controller
{

    
    public function randomSound($id)
    {
        $scene = Scene::find($id);

        if (!$scene) {
            return response()->json("Scene not found", 404);
        }
        $sounds = $scene->sounds->all();

        if (!$sounds) {
            return response()->json("Sounds not found", 404);
        }

        $randomIndex = array_rand($sounds);

        $randomSound = $sounds[$randomIndex];

        if ($randomSound) {
            return response()->json($randomSound, 200);

            $this->CompareSounds($randomSound->id);
        }
    }

    public function soundsMatch(Request $request)
    {

        $randomSoundId = $request->randomSoundId;
        $clickedSoundId = $request->clickedSoundId;


        $sucess = [
            "assertion" => true
        ];
        $failure = [
            "assertion" => false
        ];

        if ($randomSoundId == $clickedSoundId) {
            return response()->json($sucess, 200);
        } else {
            return response()->json($failure, 200);
        }
    }

    public function gameId($id) {

        $game = Game::find($id);

        return response()->json($game->id, 200);
    }

    public function userGames($id) {

        $user = User::find($id);

        $games = $user->games;

        return response()->json($games, 200);
    }

    public function gameInteractions($id) {

        $game = Game::find($id);

        $interactions = $game->interactions;

        return response()->json($interactions, 200);
    }
}

