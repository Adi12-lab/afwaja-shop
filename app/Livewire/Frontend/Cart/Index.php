<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
class Index extends Component
{

    public $cartContent, $totalPrice = 0;

    #[On('cartChanged')]
    public function checkCart() {
        if(Auth::check()) {
            return $this->cartContent = Cart::orderBy("id", "DESC")
                                            ->where("user_id", auth()->user()->id)->get();
        }
        return null;
    }


    public function decrementQuantity(int $cartId) {
        $cartData = Cart::where("id", $cartId)->where("user_id", auth()->user()->id)->first();

        if($cartData) {
                if($cartData->quantity > 1) {
                    $cartData->decrement("quantity");
                } 
    }
}
    public function incrementQuantity(int $cartId) {
        $cartData = Cart::where("id", $cartId)->where("user_id", auth()->user()->id)->first();

        if($cartData) {

            if( $cartData->productVariant()->where("id", $cartData->product_variant_id)->exists()) {//jika ada warnanya
                $productVariant = $cartData->productVariant()->where("id", $cartData->product_variant_id)->first();
                if($productVariant->quantity > $cartData->quantity) {
                    $cartData->increment("quantity");
                } else {
                    $this->dispatch("sweetAlert", message : [
                        "text" => "Kuantitas hanya $productVariant->quantity yang tersedia",
                        "type" => "warning",
                        "status" => 403
                    ]);
                }
            }
        
        } else {
            $this->dispatch("sweetAlert", message :  [
                "text" => "Something went wrong",
                "type" => "error",
                "status" => 404
            ]);
        }
    }



    public function removeCartItem(int $cartId) {
        $cartRemoveData = Cart::where("user_id", auth()->user()->id)->where("id", $cartId)->first();

        if($cartRemoveData) {
            // $cartRemoveData->delete();

            // $this->dispatch("cartChanged");
            $this->dispatch("cartAlert", message: [
                "text" => "Item berhasil dihapus",
                "type" => "success",
                "status" => 204
            ]);

        } else {
            $this->dispatch("cartAlert", message: [
                "text" => "Something went wrong",
                "type" => "error",
                "status" => 404
            ]);
        }
    }


    public function render()
    {
        $this->cartContent = $this->checkCart();
        return view('livewire.frontend.cart.index')
                ->with(["cartContent" => $this->cartContent])
                ->extends("layouts.app")
                ->section("main");
    }
}
