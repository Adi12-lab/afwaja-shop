<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
    protected $model = Product::class;
    public function definition(): array
    {
        $name =  $name = fake()->unique()->words(2, true);
        $fakeSmallParagraphs = fake()->paragraphs(2);
        $mergeSmallParagraphs = '<p>' . implode('</p><p>', $fakeSmallParagraphs) . '</p>';
        $fakeParagraphs = fake()->paragraphs(2);
        $mergeParagraphs = '<p>' . implode('</p><p>', $fakeParagraphs) . '</p>';
        return [
            "category_id" => mt_rand(1, 10),
            "brand_id" => mt_rand(1, 5),
            "name" => $name,
            "slug" => Str::slug($name),
            "small_description" => $mergeSmallParagraphs,
            "description" => $mergeParagraphs,
            "isNew" => mt_rand(0, 1),
            "status" => mt_rand(0, 1),
            "meta_title" => $name,
            "meta_keyword" => $name,
            "meta_description" => $mergeSmallParagraphs,

        ];
    }

    // public function variants() {
    //     $this->afterCreating(function(Product $product) {
    //         $product->productVariants()->saveMany(ProductVariant::factory(5)->create([
    //             "product_id" => $product->id
    //         ]));

    //         $product->productImages()->saveMany(ProductImage::factory(10)->create([
    //             "product_id" => $product->id
    //         ]));
    //     });
    // }
}
