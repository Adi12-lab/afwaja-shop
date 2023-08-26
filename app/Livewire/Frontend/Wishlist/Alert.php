<?php

namespace App\Livewire\Frontend\Wishlist;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On; 

class Alert extends Component
{

    public Product $product;
    public $id = "wishlist.alert", $message;
    
    #[On('wishlistAlert')]
    public function trigger($message) {
        // dd($message);
        $this->product = Product::findOrFail($message["product_id"]);
        $this->message = $message;
    }

    #[On("onHideWishlistAlert")]
    public function resetProp() {
        $this->reset("product", "message");
    }

    public function render()
    {
        return view('livewire.frontend.wishlist.alert');
    }
}
