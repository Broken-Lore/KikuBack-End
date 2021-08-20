<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Scene;
use App\Models\Sound;

class SceneTest extends TestCase
{
    use RefreshDatabase;

    public function test_That_scene_has_related_sounds()
    {
        Scene::factory(1)->create([]);
        Sound::factory(3)->create([
            'scene_id' => 1
        ]);

        $response = $this->get('api/scenes/1/sounds');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }
    public function test_retrieve_all_Scenes()
    {
        Scene::factory(4)->create([]);


        $response = $this->get('api/scenes');

        $response->assertStatus(200)
            ->assertJsonCount(4);
    }
}
