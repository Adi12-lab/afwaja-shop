<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $totalPrice = 0;
        if(Auth::check()) {
            $carts = Cart::orderBy("id", "DESC")
                                            ->where("user_id", Auth::user()->id)->get();
                                            // dd($carts);
        }
        // if(session()->has("carts")) {
        //     dd(session()->all);
        // }
        return view("frontend.carts", compact("carts", "totalPrice"));
    }

    public function create(Request $request) {
        $payload = $request->all();
        $pluckCartIds = collect($payload["carts"])->pluck("id");
        
        if($payload["user_id"]) {
            //hapus yang gk ada
            Cart::whereNotIn("id", $pluckCartIds)->delete();

            //update secara massal
            $cartDatabase = Cart::where("user_id", $payload["user_id"])->get();
            $cartDatabase->each(function($cart, int $key) use($payload) {
                $cart->update(["quantity" => $payload["carts"][$key]["qty"]]);
            });
            return response("Berhasil update", 200);   
        }
        
        return response("Ada Yang Salah", 500);
    }

    

}
