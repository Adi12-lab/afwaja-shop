<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\On;
class CartUtilize extends Component
{

    public $cartContent;

    public $totalPrice = 0;

   

    #[On('cartChanged')]
    public function checkCart() {
        if(Auth::check()) {
           $cartContent = Cart::where("user_id", auth()->user()->id)
                                ->orderBy("id", "DESC")->get();
            return $cartContent;
        }
        return null;
    }
   
    public function removeCartItem(int $cartId) {
        $cartRemoveData = Cart::where("user_id", auth()->user()->id)->where("id", $cartId)->first();
        if($cartRemoveData) {
            $cartRemoveData->delete();
            $this->dispatch("cartChanged");
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
        // dd($this->cartContent);
        return view('livewire.frontend.cart.cart-utilize');
    }
}
