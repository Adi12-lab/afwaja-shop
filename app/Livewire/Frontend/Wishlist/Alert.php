<?php

namespace App\Livewire\Frontend\Wishlist;

use App\Models\Product;
use App\Models\Wishlist;

use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\Attributes\On; 

use Illuminate\Support\Facades\Auth;

class Alert extends Component
{
    #[Locked]
    public Product $product;
    public $message;
    
    
    #[On("addToWishlist")]
    public function addToWishlist(int $product_id) {

            if(Wishlist::where("user_id", auth()->user()->id)->where("product_id", $product_id)->exists()) {
                $this->trigger([
                    "text" => "Sudah ditambahkan ke Favorit",
                    "type" => "success",
                    "product_id" => $product_id, 
                    "status" => 409
               ]);
                return false; 

            }
             else {
                Wishlist::create([
                     "user_id" => auth()->user()->id,
                     "product_id" => $product_id
                 ]);
                $this->trigger([
                    "text" => "Produk berhasil ditambhkan ke Favorit",
                    "type" => "success",
                    "product_id" => $product_id, 
                    "status" => 200
               ]);
                 return true;
             }
      
    }

    
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
