<?php

namespace App\Http\Controllers\Api;

use App\Models\Scene;
use Illuminate\Http\Request;

class SceneController extends Controller
{

    public function index(){
        $scenes = Scene::All();

        if($scenes){
            return response()->json($scenes, 200);
        }
    }
    public function getSounds($id)
    {
        $scene = Scene::find($id);

        $sounds = $scene->sounds;

        return response()->json($sounds, 200);
    }

}
