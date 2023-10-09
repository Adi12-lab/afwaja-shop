<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class FrontendController extends Controller
{


   public function index() {
        $newProducts = Product::where("isNew", 1)->inRandomOrder()->get();
        $popularProducts = Product::where("isPopular", 1)->inRandomOrder()->get();
        $quotes = Quote::all();
        return view("frontend.index", compact("newProducts", "popularProducts", "quotes"));
   }

    public function productView($product_slug) {
        $product = Product::where("slug", $product_slug )->first();
        return view("frontend.product.view", compact("product"));
    }

    // public function profile() {
    //     return view("frontend.profile.index");
    // }
    
}
