<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductVariant;
use App\Modles\productImages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function category() {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function brand() {
        return $this->belongsTo(Brand::class, "brand_id", "id");
    }

    public function productImages() {

        return $this->hasMany(ProductImage::class, "product_id", "id");
    }

    public function productVariants() {
        return $this->hasMany(ProductVariant::class, "product_id", "id");
    }

    public function flashSale(): HasOne {
        return $this->hasOne(FlashSale::class, "product_id", "id");
    }
}
