<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'details' => $this->faker->paragraph(3),
            'author_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 10),
            'author_name' => $this->faker->name(),
            'download_link' => $this->faker->url(),
            'category_name' => $this->faker->word(),
       
            
        ];
    }
}
