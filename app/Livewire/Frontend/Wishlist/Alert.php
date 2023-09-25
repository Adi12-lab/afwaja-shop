<?php

namespace App\Livewire\Frontend\Wishlist;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On; 

class Alert extends Component
{

    public Product $product;
    public $message;
    
    #[On('wishlistAlert')]
    public function trigger($message) {
        if(isset($message["product_id"])) {
            $this->product = Product::findOrFail($message["product_id"]);
        }
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
