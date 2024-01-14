<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $thumb = $this->faker->image('public/img/posts', 640, 480);
        return [
            'user_id' => User::pluck('id')->random(),
            'title' => $this->faker->sentence(3),
            'thumb' => str_replace('public', '', $thumb),
            'content' => $this->faker->paragraph(),
        ];
    }
}
