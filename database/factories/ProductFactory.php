<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\VendorProfile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        // TODO: أعد اسم منتج ووصفا وسعرا بوحدة cents ومخزونا وحالة نشر.
        // TODO: لا تنشئ vendor_profile_id عشوائيا هنا إذا كنت تريد التحكم في الملكية داخل الاختبار.

        $name = fake()->unique()->words(3, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(3),
            'price_amount' => fake()->numberBetween(100, 15000),
            'price_currency' => fake()->randomElement(['USD', 'EUR', 'SAR', 'AED']),
            'stock_quantity' => fake()->numberBetween(0, 150),
            'status' => fake()->randomElement(['published', 'published', 'published', 'published', 'draft', 'archived']),
        ];
    }
}
