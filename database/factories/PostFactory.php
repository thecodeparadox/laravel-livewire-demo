<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence();
        $slug = Str::slug($title);

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => $slug,
            'content' => fake()->paragraph(),
            'tags' => json_encode(fake()->words(5)), // in DB its JSON type
            'status' => fake()->randomElement(['DRAFT', 'PUBLISHED', 'UNPUBLISHED']),
            'likes' => fake()->randomNumber(3)
        ];
    }
}
