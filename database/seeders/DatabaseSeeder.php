<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Scene;
use \App\Models\Sound;

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
            'name' => 'Kitchen',
            'image' => 'Files/Scenes/kitchen.png'
        ]);

        Sound::factory(1)->create([
            'name' => 'cat',
            'image' => 'storage\app\public\Files\Kitchen\Img\cat.png',
            'audio' => 'storage\app\public\Files\Kitchen\Sounds\cat.wav',
            'scene_id' => 1
        ]);

        Sound::factory(1)->create([
            'name' => 'dog',
            'image' => 'storage\app\public\Files\Kitchen\Img\dog.png',
            'audio' => 'storage\app\public\Files\Kitchen\Sounds\dog.mp3',
            'scene_id' => 1
        ]);

        Sound::factory(1)->create([
            'name' => 'clock',
            'image' => 'storage\app\public\Files\Kitchen\Img\clock.png',
            'audio' => 'storage\app\public\Files\Kitchen\Sounds\clock.mp3',
            'scene_id' => 1
        ]);
        Sound::factory(1)->create([
            'name' => 'fridge',
            'image' => 'storage\app\public\Files\Kitchen\Img\fridge.png',
            'audio' => 'storage\app\public\Files\Kitchen\Sounds\fridge.mp3',
            'scene_id' => 1
        ]);
        Sound::factory(1)->create([
            'name' => 'kettle',
            'image' => 'storage\app\public\Files\Kitchen\Img\kettle.png',
            'audio' => 'storage\app\public\Files\Kitchen\Sounds\kettle.mp3',
            'scene_id' => 1
        ]);
        Sound::factory(1)->create([
            'name' => 'mixer',
            'image' => 'storage\app\public\Files\Kitchen\Img\mixer.png',
            'audio' => 'storage\app\public\Files\Kitchen\Sounds\mixer.mp3',
            'scene_id' => 1
        ]);
        Sound::factory(1)->create([
            'name' => 'pan',
            'image' => 'storage\app\public\Files\Kitchen\Img\pan.png',
            'audio' => 'storage\app\public\Files\Kitchen\Sounds\pan.mp3',
            'scene_id' => 1
        ]);
    }
}
