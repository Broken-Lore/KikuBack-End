<?php

namespace App\Http\Controllers\Api;

use App\Models\Sound;
use Illuminate\Http\Request;

class SoundController extends Controller
{

    public function index()
    {
        $sounds = Sound::all();

        if ($sounds) {
            return response()->json($sounds, 200);
        }
    }

    public function getSound($id)
    {
        $sound = Sound::find($id);
        if ($sound) {
            return response()->json($sound, 200);
        }
    }

    public function store(Request $request)
    {
        $sound = new Sound;
        $sound->name = $request->name;
        $sound->scene_id = $request->scene_id;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;

            $file->store('images', 'public');
            $sound->image = $filename;
        }

        if ($request->hasfile('audio')) {
            $file = $request->file('audio');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('audios', 'public');
            $sound->audio = $filename;
        }

        $sound->save();
    }
}
