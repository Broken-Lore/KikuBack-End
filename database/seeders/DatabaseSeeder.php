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
       Scene::factory(1)->create([
           'name' => 'Kitchen'
       ]);

       Sound::factory(1)->create([

       ]);
    }
}
