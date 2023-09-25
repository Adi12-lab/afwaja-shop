<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with(["productVariants", "productImages"])->paginate(12);
        $categories = Category::all();
        return view("frontend.products", compact("products", "categories"));
    }
}
