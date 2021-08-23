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

    public function test_retrieve_sound_by_id()
    {
        Scene::factory(1)->create([]);
        Sound::factory(1)->create([
            'name' => 'Cat',
            'image' => 'storage\app\public\Files\Kitchen\Img\cat.png',
            'audio' => 'storage\app\public\Files\Kitchen\Sounds\cat.wav',
            'scene_id' => 1
        ]);
        $data = ['name' => "Cat"];
        $response = $this->get('api/sounds/1');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);
    }
}
