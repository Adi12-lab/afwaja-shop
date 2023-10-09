<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        $carts = Cart::join('product_variants', 'product_variants.id', '=', 'carts.product_variant_id')
                        ->join("products", "products.id", "=", "carts.product_id")->where("user_id", Auth::user()->id)
        ->select('carts.id','products.name', 'carts.quantity', 'product_variants.size', 'product_variants.selling_price')
        ->get();
        $carts->each(function($item) {
            $item["total_price"] = $item["selling_price"] * $item["quantity"]; 
        });
        $provinces = DB::table("tb_ro_provinces")->get();
        return view("frontend.checkout", compact("carts", "provinces"));
    }
    
    public function getCities(Request $request) {
        // $payloads = $request->all();
        $provinceId = $request->get("province_id");
        $cities = DB::table('tb_ro_cities')->where("province_id", $provinceId)->get();
        return response()->json($cities, 200);
    }

    public function getSubdistricts(Request $request) {
        // $payloads = $request->all();
        $cityId = $request->get("city_id");
        $subdistricts = DB::table('tb_ro_subdistricts')->where("city_id", $cityId)->get();
        return response()->json($subdistricts, 200);
    }
}
