<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->title(),
            "body_html" => $this->faker->text(),
            "vendor" => $this->faker->password(),
            "product_type" => $this->faker->title(),
            "tags" => $this->faker->word(),
            "variants" => $this->faker->title(),
            "images" => $this->faker->image()            
        ];
    }
}
 