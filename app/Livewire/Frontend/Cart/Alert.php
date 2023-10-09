<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductVariant;
use Livewire\Component;
use Livewire\Attributes\On;

use Illuminate\Support\Facades\Auth;
class Alert extends Component
{


    public $message;

    #[On("addToCart")]
    public function addToCart(int $product_id) {
        $product = Product::find($product_id);
            if($product->status === 1) {
                $cekVariant = ProductVariant::where("product_id", $product_id)->where("quantity", ">", 0)->first();
                if($cekVariant) {
                        if(1 <= $cekVariant->quantity) {
                            $existsCart = Cart::
                                        where("product_id", $product_id)
                                        ->where("product_variant_id", $cekVariant->id)
                                        ->where("user_id", auth()->user()->id)->first();

                            if($existsCart) {
                                $existsCart->increment("quantity", 1);
                                $this->dispatch("cartChanged");
                                $this->trigger([
                                    "text" => "Jumlah kuantitas berhasil ditambah",
                                    "type" => "success",
                                    "product_id" => $product_id, 
                                    "status" => 200
                               ]);
                            } else {
                                Cart::create([
                                    "user_id" => auth()->user()->id,
                                    "product_id" => $product_id,
                                    "product_variant_id" => $cekVariant->id,
                                    "quantity" =>  1
                                ]);
                                $this->dispatch("cartChanged");
                                $this->trigger([
                                    "text" => "Produk berhasil ditambahkan",
                                    "type" => "success",
                                    "product_id" => $product_id, 
                                    "status" => 201
                               ]);

                            }
                        } else {
                            //dispatch quantity tidak cukup
                            $this->trigger([
                                "text" => "Kuantitas melebihi stok $cekVariant->quantity",
                                "type" => "error",
                                "status" => 403
                           ]);
                        }
                } else {
                    //dispacth something is went wrong
                    $this->trigger([
                        "text" => "Ada yang salah",
                        "type" => "error",
                        "status" => 500
                   ]);
                }
            }
        
    }


    #[On("cartAlert")]
    public function trigger($message) {
        $this->message = $message;
    }

    #[On("onHideCartAlert")]
    public function resetProp() {
        $this->reset("product", "message");
    }

    public function render()
    {
        return view('livewire.frontend.cart.alert');
    }
}
