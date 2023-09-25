<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "role_as" => 1,
            'email_verified_at' => now(),
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
        ]);
        Category::factory(10)->create();
        Brand::factory(5)->create();

        Product::factory(40)->has(ProductImage::factory(10))->has(ProductVariant::factory(5))->create();



        
    }
}
