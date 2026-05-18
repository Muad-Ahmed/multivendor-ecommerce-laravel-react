<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class VendorProfileFactory extends Factory
{
    public function definition(): array
    {
        // TODO: أعد مصفوفة بيانات وهمية للبائع مثل store_name و slug و status.
        // TODO: اربط user_id بمستخدم دوره vendor عند كتابة الاختبارات.

        $storeName = fake()->unique()->company();
        return [

            'store_name' => $storeName,
            'slug' => Str::slug($storeName),
            'status' => fake()->weightedElement([
                'approved'  => 80,
                'pending'   => 10,
                'suspended' => 10,
            ]),
            'bio' => fake()->paragraph(),
            'support_email' => fake()->companyEmail(),
            'branding_color' => fake()->hexColor(),

        ];
    }
}
