<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'news_title' => $this->faker->sentence(mt_rand(5, 10)),
            'news_content' => $this->faker->paragraph(mt_rand(5, 10)),
            'news_slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'category_id' => mt_rand(1, 2),
            'author_id' => mt_rand(1, 2)
        ];
    }
}
