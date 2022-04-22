<?php

namespace Deidax\BlogPackage\Database\Factories;

use Deidax\BlogPackage\Models\Post;
use Deidax\BlogPackage\Tests\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $author = User::factory()->create();

        return [
            'title'     => $this->faker->words(3, true),
            'body'      => $this->faker->paragraph,
            'author_id' => $author->id,
            'author_type' => get_class($author)
        ];
    }
}