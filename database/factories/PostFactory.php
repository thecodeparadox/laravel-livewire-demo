<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Attach Tags to Post
     *
     * @return void
     */
    public function configure()
    {
        // $tags = Tag::inRandomOrder()->limit(5)->get()->pluck('id')->toArray();

        $allTags = Tag::all()->pluck('id')->toArray();
        $tags = Arr::random($allTags, 5);

        return $this->afterCreating(function (Post $post) use ($tags) {
            $post->tags()->attach($tags);
        });
    }

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
            'user_id' => User::count() ? User::inRandomOrder()->first()->id : User::factory(),
            'title' => $title,
            'slug' => $slug,
            'content' => fake()->text(500),
            'status' => fake()->randomElement(['DRAFT', 'PUBLISHED', 'UNPUBLISHED']),
            'likes' => fake()->randomNumber(3)
        ];
    }
}
