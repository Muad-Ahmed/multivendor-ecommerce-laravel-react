<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\VendorProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $categories = Category::factory(8)->create();


        User::factory(10)->customer()->create();

        User::factory()->admin()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        User::factory(5)
            ->vendor()
            ->has(
                VendorProfile::factory()
                    ->has(
                        Product::factory(10)
                            ->state(fn() => ['category_id' => $categories->random()->id])
                            ->has(ProductImage::factory(3), 'productImages')
                    )
            )
            ->create();

    }
}
