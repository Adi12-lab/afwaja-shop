<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function productCategory($category_slug) {
        $productCategory  = Category::where("slug", $category_slug)->products()->get();
    }

    public function productView($product_slug) {
        $product = Product::where("slug", $product_slug )->first();
        return view("frontend.product.view", compact("product"));
    }

    // public function profile() {
    //     return view("frontend.profile.index");
    // }
    
}
