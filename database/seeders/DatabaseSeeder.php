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
           'name' => 'Kitchen'
       ]);

       Sound::factory(1)->create([
        'name' => 'Cat',
        'image' => 'storage\app\public\Files\Kitchen\Img\cat.png',
        'audio' => 'storage\app\public\Files\Kitchen\Sounds\cat.wav',
        'scene_id' => 1
        ]);
    }
}
