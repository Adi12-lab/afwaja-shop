<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Product;
use Error;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public $product_quick_view;    

    public function quickView(int $product_id) {
        $this->product_quick_view = Product::find($product_id);
        // dd($this->dataProduct);
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
