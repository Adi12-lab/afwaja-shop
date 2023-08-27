<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class CartCounter extends Component
{
    public $cartCount = 0;

    #[On('cartChanged')]
    public function checkCartCount() {
        if(Auth::check()) {
            return $this->cartCount = Cart::where("user_id", auth()->user()->id)->count();
        } else {
            return $this->cartCount = 0;
        }
    }

    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.frontend.cart.cart-counter')->with([
            "cartCount" => $this->cartCount
        ]);
    }
}
