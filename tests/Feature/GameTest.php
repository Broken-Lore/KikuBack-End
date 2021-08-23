<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Scene;
use App\Models\Sound;

class GameTest extends TestCase
{

    use RefreshDatabase;

    public function test_can_retrieve_random_sound()
    {
        Scene::factory(1)->create([]);
        Sound::factory(3)->create([
            'scene_id' => 1
        ]);
        $response = $this->get('api/gameSound/1');


        $response->assertStatus(200)
        ->assertJsonStructure([
            "name"
        ]);
    }

    public function test_can_error_message_when_there_is_no_scene()
    {
        Scene::factory(1)->create([]);
        Sound::factory(3)->create([
            'scene_id' => 1
        ]);
        $response = $this->get('api/gameSound/4');


        $response->assertStatus(404);
         
    }

    public function test_can_error_message_when_there_is_no_sounds()
    {
        Scene::factory(1)->create([]);

        $response = $this->get('api/gameSound/1');


        $response->assertStatus(404);
    }
}


