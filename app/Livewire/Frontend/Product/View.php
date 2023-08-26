<?php
namespace App\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class View extends Component {

    public Product $product, $product_quick_view;    
    
    public $quantity = 1;


    public function mount(Product $product) {
        // dd($product);
        $this->product = $product;
    }

    public function increment() {
        $this->quantity++;
    }
    public function decrement() {
        $this->quantity--;
    }

    public function quickView(int $product_id) {
        $this->product_quick_view = Product::find($product_id);
        // dd($this->dataProduct);
    }

    public function render() {
        return view("livewire.frontend.product.view")->with([
            "product" => $this->product
        ])->extends("layouts.app")->section("main");
    }
}