<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with(["productVariants", "productImages"])->paginate(12);
        // dd($products);
        $startIndex = ($products->currentPage() - 1) * $products->perPage() + 1;
        $endIndex = $startIndex + $products->perPage() - 1;
        $categories = Category::all();
        $isLogin = Auth::check();
        return view("frontend.products", compact("products", "categories", "isLogin", "startIndex", "endIndex"));
    }
}
