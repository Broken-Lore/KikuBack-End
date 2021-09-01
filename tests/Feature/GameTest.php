<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Scene;
use App\Models\Sound;
use App\Models\Game;

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

    public function test_can_error_message_when_there_are_no_sounds()
    {
        Scene::factory(1)->create([]);

        $response = $this->get('api/gameSound/1');


        $response->assertStatus(404);
    }


    public function test_response_is_true_when_ids_match(){

        $response = $this->post('api/compare', [
            'randomSoundId' => 1,
            'clickedSoundId' => 1,
        ]);

        $response->assertExactJson(
            [
                "assertion" => true,
            ]);
    }
   

    public function test_response_is_false_when_ids_dont_match(){

        $response = $this->post('api/compare', [
            'randomSoundId' => 1,
            'clickedSoundId' => 4,
        ]);

        $response->assertExactJson(
            [
                "assertion" => false,
            ]);;
    }
    public function test_can_retrieve_gameId_when_created(){

        Game::factory()->create([]);

        $response = $this->get('api/gameId/1');

        $response->assertStatus(200)
        ->assertExactJson([1]);
    }

}


