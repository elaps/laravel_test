<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $title = $this->faker->unique()->sentence();
        return [
            'title' => $title,
            'user_id' => 1,
            'alias' => Str::slug($title),
            'body' => $this->faker->text(),
            'published'=>$this->faker->boolean()
        ];
    }
}
