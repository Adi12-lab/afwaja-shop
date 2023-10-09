<?php

namespace App\Livewire\Frontend\Wishlist;
use App\Models\Wishlist;
use Livewire\Component; 

class Index extends Component
{

    public  function removeWishlistItem(int $wishlistId) {
        Wishlist::where("user_id", auth()->user()->id)->where("id", $wishlistId)->delete();
        $this->dispatch("wishlistAlert", message: [
            "text" => "Produk favorit berhasil dihapus",
            "type" => "success",
            "status" => 204
        ]);
    }

    public function render()
    {
        $originalWishlists = Wishlist::with(["product.productVariants", "product.productImages"])
                                ->where("user_id", auth()->user()->id)->get();
        
        $wishlists =  collect($originalWishlists)->map(function ($item) {
            $variant = collect($item->product->productVariants)->first(function ($variant) {
                return $variant->quantity > 0;
            });
        
            return [
                "wishlist_id" => $item->id,
                "user_id" => $item->user_id,
                "product_id" => $item->product_id,
                "product_name" => $item->product->name,
                "product_slug" => $item->product->slug,
                "selling_price" => $variant->selling_price,
                "quantity" => $variant->quantity,
                "image" => $item->product->productImages[0]->image
            ];
        });

        
        return view('livewire.frontend.wishlist.index')
                ->with(["wishlists" => $wishlists])
                ->extends("layouts.app")->section("main");
    }
}

