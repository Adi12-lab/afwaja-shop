<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public $product_quick_view;    

    public function quickView(int $product_id) {
        $this->product_quick_view = Product::find($product_id);
        // dd($this->dataProduct);
    }

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

    public function render()
    {
        $products = Product::with(["productVariants", "productImages"])->paginate(1);
        $categories = Category::all();
        return view('livewire.frontend.product.index', [
            "products" => $products,
            "categories" => $categories
        ])->extends("layouts.app")->section("main");
    }

}
