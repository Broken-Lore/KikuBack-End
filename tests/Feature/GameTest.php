<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Scene;
use App\Models\Sound;
use App\Models\Game;
use App\Models\User;
use App\Models\Interaction;

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


    public function test_response_is_true_when_ids_match()
    {

        $response = $this->post('api/compare', [
            'randomSoundId' => 1,
            'clickedSoundId' => 1,
        ]);

        $response->assertExactJson(
            [
                "assertion" => true,
            ]
        );
    }


    public function test_response_is_false_when_ids_dont_match()
    {

        $response = $this->post('api/compare', [
            'randomSoundId' => 1,
            'clickedSoundId' => 4,
        ]);

        $response->assertExactJson(
            [
                "assertion" => false,
            ]
        );;
    }
    public function test_can_retrieve_gameId_when_created()
    {

        User::factory(1)->create([
            'id' => 4
        ]);
        Game::factory(1)->create([

            'id' => 1,
            'user_id' => 4
        ]);


        $response = $this->get('api/gameId/1');

        $response->assertStatus(200)
            ->assertExactJson([1]);
    }

    public function test_a_game_can_have_multiple_interactions()
    {
        Scene::factory(1)->create([]);
        Sound::factory(1)->create([
            'scene_id' => 1
        ]);
        User::factory(1)->create(['id' => 2]);
        Game::factory(1)->create(['id' => 1, 'user_id' => 2]);
        Scene::factory(1)->create(['id' => 9]);
        Sound::factory(1)->create(['id' => 65, 'scene_id' => 9]);
        Interaction::factory(5)->create([
            'game_id' => 1,
            'sound_id' => 65,
            'isCorrect' => true
        ]);

        $response = $this->get('api/gameId/1/interactions');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }
}
