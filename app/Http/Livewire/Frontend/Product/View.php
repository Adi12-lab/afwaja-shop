<?php
namespace App\Http\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class View extends Component {

    public $product;

    public function mount($product) {
        $this->product = $product;
    }

    public function render() {
        return view("livewire.frontend.product.view", [
            "product" => $this->product
        ]);
    }
}