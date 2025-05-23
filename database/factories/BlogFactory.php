<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'content' => $this->faker->word(),
            'excerpt' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'admin_id' => Admin::factory(),
        ];
    }
}
