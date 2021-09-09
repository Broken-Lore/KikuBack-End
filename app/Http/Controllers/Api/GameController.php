<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Scene;
use App\Models\Sound;
use App\Models\Game;
use App\Models\User;
use App\Models\Interaction;


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

        $gameId = $request->gameId;
        $randomSoundId = $request->randomSoundId;
        $clickedSoundId = $request->clickedSoundId;

        $game =  Game::find($gameId);

        if($game->interactions->count() >= 14){
            return response()->json("done", 200);
        }

        $sucess = [
            "assertion" => true
        ];
        $failure = [
            "assertion" => false
        ];

        if ($randomSoundId == $clickedSoundId) {
            $this->storeSound($randomSoundId, true, $gameId);
            return response()->json($sucess, 200);
        } else {
            $this->storeSound($randomSoundId, false, $gameId);
            return response()->json($failure, 200);
        }
    }

   public function newGame() {
       $user = Auth::user();
       $newGame = New Game();
       $newGame->user_id = $user->id;
       $newGame->save();

       return response()->json($newGame, 200);
   }

 public function gameId($id) {

        $game = Game::find($id);

        return response()->json($game, 200);
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

    public function storeSound($randomSoundId, $assertion, $game) {
        $interaction = New Interaction();
        $interaction->game_id = $game;
        $interaction->sound_id=$randomSoundId;
        $interaction->isCorrect=$assertion;
        $interaction->save();
    }
}

