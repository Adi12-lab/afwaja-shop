<?php
namespace App\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Component;

class View extends Component {

    public Product $product, $product_quick_view;

    public $size_available, $variant_available, $globalVariants;    
    public $selected_size = [
        "name" => null,
        "selling_price" => 0,
        "original_price" => 0
    ], $selected_variant = [
        "name" => null,
        "code" => null
    ];
    public $quantity = 1;


    public function mount(Product $product) {
        // dd($product);
        $this->product = $product;
        $this->globalVariants = collect($product->productVariants);
        $this->size_available = $this->globalVariants
                                ->where('quantity', '>', 0) // Mengambil hanya data dengan quantity lebih dari 0
                                ->groupBy('size') // Mengelompokkan data berdasarkan size
                                ->map(function ($items) {
                                    $item = $items->first(); // Mengambil salah satu item dari grup (karena original_price dan selling_price sama dalam grup yang sama)
                                    return [
                                        "size" => $item['size'],
                                        "selling_price" => $item['selling_price'],
                                        "original_price" => $item['original_price'],
                                    ];
                                })
                                ->values();// Menghapus keys dari hasil grup sehingga menghasilkan indeks numerik

                                $firstSize = $this->globalVariants->pluck("size")->first();
        $this->variant_available = $this->globalVariants
                                    ->where('size', $firstSize)
                                    ->where('quantity', '>', 0)
                                    ->map(function ($item) {
                                        return [
                                            "name" => $item["name"],
                                            "code" => $item["code"],
                                        ];
                                    })
                                    ->values();
    }

    public function increment() {
        $this->quantity++;
    }
    public function decrement() {
        $this->quantity--;
    }

    public function selectSize($sizeSelect) {   
        //cari size yang sama
        $sizeFind = $this->globalVariants->firstWhere("size", $sizeSelect);
        // $sizeFind = 
        $this->selected_size = [
            "name" => $sizeFind["size"],
            "selling_price" => $sizeFind["selling_price"],
            "original_price" => $sizeFind["original_price"]
        ];
        $this->selected_variant = [
            "name" => null,
            "code" => null,
        ];
        $this->variant_available = $this->globalVariants
                                    ->where('size', $sizeSelect)
                                    ->where('quantity', '>', 0)
                                    ->map(function ($item) {
                                        return [
                                            "name" => $item["name"],
                                            "code" => $item["code"],
                                        ];
                                    })
                                    ->values();


    }
    public function selectVariant($variantSelect) {
        $this->selected_variant = $this->globalVariants
                                    ->where("size", $this->selected_size["name"])
                                    ->where("code", $variantSelect)
                                    ->map(function($item) {
                                        return [
                                            "name" => $item["name"],
                                            "code" => $item["code"],
                                        ];
                                    })->values()->collapse();
    }

    public function addToCart() {
        $dataForCart = [
            "name" => $this->selected_variant["name"],
            "code" => $this->selected_variant["code"],
            "size" => $this->selected_size["name"], 
            "quantity" => $this->quantity
        ];
        dd($dataForCart);
    }
    public function quickView(int $product_id) {
        $this->product_quick_view = Product::find($product_id);
    }

    public function render() {
        return view("livewire.frontend.product.view")->with([
            "product" => $this->product
        ])->extends("layouts.app")->section("main");
    }
}


