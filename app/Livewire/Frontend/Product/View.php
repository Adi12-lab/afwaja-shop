<?php
namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Locked;
use Livewire\Component;

class View extends Component {

    public Product $product;

    public $size_available, $variant_available;

    #[Locked] 
    public $globalVariants;   

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
    
    
    public function addToCart(int $productId) {
            $product = $this->product->firstWhere("id", $productId);
            // dd($product);
            if($product && $product->status === 1) {
                $cekVariant = $this->globalVariants->where("size", $this->selected_size["name"])->where("code", $this->selected_variant["code"])->first();
                if($cekVariant) {
                    if($this->quantity > 0) {
                        if($this->quantity <= $cekVariant->quantity) {
                            $existsCart = Cart::
                                        where("product_id", $productId)
                                        ->where("product_variant_id", $cekVariant->id)->where("user_id", auth()->user()->id)->first();
                            if($existsCart) {
                                $existsCart->increment("quantity", $this->quantity);
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
                                    "quantity" =>  $this->quantity
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
                        //dispacth quantity tidak valid
                        $this->dispatch("cartAlert", message: [
                            "text" => "Kuantitas tidak valid",
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
      
    }

    public function render() {
        return view("livewire.frontend.product.view")->with([
            "product" => $this->product,
            "isLogin" => Auth::check()
        ])->extends("layouts.app")->section("main");
    }
}


