<?php

namespace Database\Factories;

use App\Models\ProductVariant;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductVariant::class;
    
    public function definition(): array
    {
        $price = mt_rand(50000, 200000);
        return [
            "name" => Str::random(5),
            "size" => Str::random(2), 
            "code" => generateRandomHexColor(),
            "original_price" => $price,
            "selling_price" => $price - 10000,
            "quantity" => mt_rand(1,50)
        ];
    }
}
