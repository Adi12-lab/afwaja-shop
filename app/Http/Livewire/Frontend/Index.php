<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;


class Index extends Component {


    public function render() {

        $newProduct = Product::with(["productVariants", "productImages", "category"])->where("isNew", 0)->get();
        // dd($newProduct);

        return view("livewire.frontend.index", [
            "newProduct" => $newProduct
        ])->extends('layouts.app')->section("main");
    }

}
