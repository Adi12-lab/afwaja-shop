<?php

namespace App\Livewire\Frontend\Wishlist;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\ProductVariant;

use Illuminate\Support\Facades\Auth;
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

    public function addToCart(int $productId) {
        if(Auth::check()) {
            if(Product::where("id", $productId)->where("status", 0)->exists()) {
                $cekVariant = ProductVariant::where("product_id", $productId)->where("quantity", ">", 0)->first();
                if($cekVariant) {
                        if(1 <= $cekVariant->quantity) {
                            $existsCart = Cart::
                                        where("user_id", auth()->user()->id)
                                        ->where("product_id", $productId)
                                        ->where("product_variant_id", $cekVariant->id)->first();

                            if($existsCart) {
                                $existsCart->increment("quantity", 1);
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
                                    "quantity" =>  1
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

