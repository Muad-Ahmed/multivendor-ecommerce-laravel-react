<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'storage_disk' => 'public',
            'image_path' => 'products/' . fake()->uuid() . '.jpg',
            'alt_text' => fake()->optional()->sentence(),
            'is_primary' => false,
        ];
    }

    public function primary(): static
    {
        return $this->state(fn() => [
            'is_primary' => true,
            'sort_order' => 0,
        ]);
    }
}
