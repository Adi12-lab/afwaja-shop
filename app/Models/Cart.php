<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductVariant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts";

    protected $guarded = ["id"];

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
    public function productColor() : BelongsTo {
        return $this->belongsTo(ProductVariant::class,"product_variant_id", "id");
    }

}
