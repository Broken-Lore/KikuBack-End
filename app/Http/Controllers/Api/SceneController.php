<?php

namespace App\Http\Controllers\Api;

use App\Models\Scene;
use Illuminate\Http\Request;
use public\storage\Files\Scenes;

class SceneController extends Controller
{

    public function index(){
        $scenes = Scene::All();
        if($scenes){
            return response()->json($scenes, 200);
        }
    }

    public function getImageScenes() {
    
        $scenes = Scene::All();
        foreach ($scenes as $scene);
        $sceneImage = $scene->image;
      /*   dd($sceneImage); */
        return view('scenes', ['scenes' => $scenes]);
   

    }
    public function getSounds($id)
    {
        $scene = Scene::find($id);

        $sounds = $scene->sounds;

        return response()->json($sounds, 200);
    }
}
