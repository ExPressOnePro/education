<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first(); // Получаем случайный продукт
        $category = Category::inRandomOrder()->first(); // Получаем случайную категорию

        return [
            'product_id' => $product->id,
            'category_id' => $category->id,
        ];
    }
}
