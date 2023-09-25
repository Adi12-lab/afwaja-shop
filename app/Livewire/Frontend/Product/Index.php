<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ProductVariant;
use App\Models\Cart;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

  
    public function addToWishlist(int $productId) {
        if(Auth::check()) {

            if(Wishlist::where("user_id", auth()->user()->id)->where("product_id", $productId)->exists()) {
                $this->dispatch("wishlistAlert", message: [
                    "text" => "Sudah ditambahkan ke Favorit",
                    "type" => "warning",
                    "product_id" => $productId, 
                    "status" => 409
               ]);
                return false; 

            }
             else {
                Wishlist::create([
                     "user_id" => auth()->user()->id,
                     "product_id" => $productId
                 ]);
                $this->dispatch("wishlistAlert", message: [
                    "text" => "Produk berhasil ditambhkan ke Favorit",
                    "type" => "success",
                    "product_id" => $productId, 
                    "status" => 200
               ]);
                 return true;
             }
        }
        else {
            return to_route("login");

        }
    }

    public function addToCart(int $productId) {
        if(Auth::check()) {
            if(Product::where("id", $productId)->where("status", 0)->exists()) {//gak logis
                $cekVariant = ProductVariant::where("product_id", $productId)->where("quantity", ">", 0)->first();
                if($cekVariant) {
                        if(1 <= $cekVariant->quantity) {
                            $existsCart = Cart::
                                        where("product_id", $productId)
                                        ->where("product_variant_id", $cekVariant->id)
                                        ->where("user_id", auth()->user()->id)->first();

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
        $products = Product::with(["productVariants", "productImages"])->paginate(12);
        $categories = Category::all();
        return view('livewire.frontend.product.index', [
            "products" => $products,
            "categories" => $categories
        ])->extends("layouts.app")->section("main");
    }

}
