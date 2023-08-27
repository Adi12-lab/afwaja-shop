<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductVariant;
use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\Auth;
class QuickView extends Component
{

    public $product;
    public int $quantity = 1;

    public function increment() {
        $this->quantity++;
    }
    public function decrement() {
        $this->quantity--;
    }

    #[On('quickViewTrigger')]
    public function trigger(int $product_id) {
        return $this->product = Product::find($product_id);
    }

    public function addToCart(int $productId) {
        if(Auth::check()) {
            if($this->product->where("id", $productId)->where("status", 0)->exists()) {
                $cekVariant = ProductVariant::where("product_id", $productId)->where("quantity", ">", 0)->first();
                if($cekVariant) {
                    if($this->quantity > 0) {
                        if($this->quantity <= $cekVariant->quantity) {
                            $existsCart = Cart::
                                        where("product_id", $productId)
                                        ->where("product_variant_id", $cekVariant->id)->where("user_id", auth()->user()->id)->first();

                            if($existsCart) {
                                $existsCart->increment("quantity", $this->quantity);
                                $this->dispatch("cartChanged");
                                $this->dispatch("cartAlert", message: [
                                    "text" => "Jumlah kuantitas berhasil ditambah",
                                    "type" => "success",
                                    "product_id" => $productId, 
                                    "status" => 200
                               ]);
                            } else {
                                Cart::create([
                                    "user_id" => auth()->user()->id,
                                    "product_id" => $productId,
                                    "product_variant_id" => $cekVariant->id,
                                    "quantity" =>  $this->quantity
                                ]);
                                $this->dispatch("cartChanged");
                                $this->dispatch("cartAlert", message: [
                                    "text" => "Produk berhasil ditambahkan",
                                    "type" => "success",
                                    "product_id" => $productId, 
                                    "status" => 201
                               ]);

                            }
                        } else {
                            //dispatch quantity tidak cukup
                            $this->dispatch("cartAlert", message: [
                                "text" => "Kuantitas melebihi stok $cekVariant->quantity",
                                "type" => "error",
                                "status" => 403
                           ]);
                        }
                    } else {
                        //dispacth quantity tidak valid
                        $this->dispatch("cartAlert", message: [
                            "text" => "Kuantitas tidak valid",
                            "type" => "error",
                            "status" => 403
                       ]);
                    }
                } else {
                    //dispacth something is went wrong
                    $this->dispatch("cartAlert", message: [
                        "text" => "Ada yang salah",
                        "type" => "error",
                        "status" => 500
                   ]);
                }
            }
        } else {
            return to_route("login");

        }
    }

    public function render()
    {
        return view('livewire.frontend.quick-view')->with([
            "product" => $this->product
        ]);
    }
}
