<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Scene;
use \App\Models\Sound;
use \App\Models\Game;
use \App\Models\User;
use \App\Models\Interaction;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $kitchen = Scene::factory(1)->create([
            'name' => 'Kitchen'
        ]);

        Sound::factory(1)->create([
            'name' => 'cat',
            'image' => 'C:\PROGRA~1\KMSpico\temp\cat.wav',
            'audio' => 'https://github.com/Armun4/KikuBack-End/blob/dev/public/Files/Kitchen/Sounds/cat.wav?raw=true',
            'scene_id' => 1
        ]);

        Sound::factory(1)->create([
            'name' => 'dog',
            'image' => 'storage\app\public\Files\Kitchen\Img\dog.png',
            'audio' => 'https://github.com/Armun4/KikuBack-End/blob/dev/public/Files/Kitchen/Sounds/dog.mp3?raw=true',
            'scene_id' => 1
        ]);

        Sound::factory(1)->create([
            'name' => 'clock',
            'image' => 'storage\app\public\Files\Kitchen\Img\clock.png',
            'audio' => 'https://github.com/Armun4/KikuBack-End/blob/dev/public/Files/Kitchen/Sounds/clock.mp3?raw=true',
            'scene_id' => 1
        ]);
        Sound::factory(1)->create([
            'name' => 'fridge',
            'image' => 'storage\app\public\Files\Kitchen\Img\fridge.png',
            'audio' => 'https://github.com/Armun4/KikuBack-End/blob/dev/public/Files/Kitchen/Sounds/fridge.mp3?raw=true',
            'scene_id' => 1
        ]);
        Sound::factory(1)->create([
            'name' => 'kettle',
            'image' => 'storage\app\public\Files\Kitchen\Img\kettle.png',
            'audio' => 'https://github.com/Armun4/KikuBack-End/blob/dev/public/Files/Kitchen/Sounds/kettle.mp3?raw=true',
            'scene_id' => 1
        ]);
        Sound::factory(1)->create([
            'name' => 'mixer',
            'image' => 'storage\app\public\Files\Kitchen\Img\mixer.png',
            'audio' => 'https://github.com/Armun4/KikuBack-End/blob/dev/public/Files/Kitchen/Sounds/mixer.mp3?raw=true',
            'scene_id' => 1
        ]);
        Sound::factory(1)->create([
            'name' => 'pan',
            'image' => 'storage\app\public\Files\Kitchen\Img\pan.png',
            'audio' => 'https://github.com/Armun4/KikuBack-End/blob/dev/public/Files/Kitchen/Sounds/pan.mp3?raw=true',
            'scene_id' => 1
        ]);

       User::factory(1)->create(['id' => 1]);
       Game::factory(1)->create(['id' => 1, 'user_id' => 1]);
       Interaction::factory(3)->create(['game_id' => 1, 'sound_id' => 1, 'isCorrect' => true]);
    }
}
