<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;



class Index extends Component {
    
    
    public function render() {

        $newProduct = Product::with(["productVariants", "productImages", "category"])->where("isNew", 1)->get();

        return view("livewire.frontend.index")->with([
            "newProduct" => $newProduct
        ])->extends("layouts.app")->section("main");
    }

}
