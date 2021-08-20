<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Scene;
use App\Models\Sound;

class SoundTest extends TestCase
{
    use RefreshDatabase;
    public function test_retrieve_all_Sounds()
    {
        Scene::factory(1)->create([]);
        Sound::factory(4)->create([
            'scene_id' => 1
        ]);


        $response = $this->get('api/sounds');

        $response->assertStatus(200)
            ->assertJsonCount(4);
    }
}
