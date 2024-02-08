<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'title' => $this->faker->word,
            'domain_name' => $this->faker->domainName,
            'views' => $this->faker->numberBetween(0, 1000),
            'likes' => $this->faker->numberBetween(0, 500),
            'orders' => $this->faker->numberBetween(0, 100),
            'age' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->realText(200), // Генерирует текст из 200 символов
            'advantages' => $this->faker->realText(100), // Генерирует текст из 100 символов
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'discount' => $this->faker->randomFloat(2, 0, 50),
        ];
    }
}
