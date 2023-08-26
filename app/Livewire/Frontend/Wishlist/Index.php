<?php

namespace App\Livewire\Frontend\Wishlist;

use App\Models\Product;
use App\Models\Wishlist;

use Livewire\Component;

class Index extends Component
{

    public  function removeWishlistItem(int $wishlistId) {
        // dd($wishlistId);
        Wishlist::where("user_id", auth()->user()->id)->where("id", $wishlistId)->delete();
        $this->dispatch("wishlistRemoved", message: [
            "text" => "Produk favorit berhasil dihapus",
            "type" => "success",
            "status" => 204
        ]);
    }



    public function render()
    {
        $wishlists = Wishlist::with(["product.productVariants", "product.productImages"])->where("user_id", auth()->user()->id)->get();
        return view('livewire.frontend.wishlist.index')
                ->with(["wishlists" => $wishlists])
                ->extends("layouts.app")->section("main");
    }
}
