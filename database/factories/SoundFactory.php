<?php

namespace Database\Factories;

use App\Models\Sound;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sound::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->firstName(),
            "image" => $this->faker->image(),
            "audio" => $this->faker->image(),
            "scene_id" => $this->faker->randomDigit()
        ];
    }
}
