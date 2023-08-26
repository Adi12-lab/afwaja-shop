<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;
use Illuminate\Support\Facades\File;
class Index extends Component
{
    public $product_id;


    public function deleteProduct(int $product_id) {
        $this->product_id  = $product_id;
    }

    public function destroyProduct() {
        //ambil gambar dari database
        $images = ProductImage::where("product_id", $this->product_id)->get();
        foreach($images as $image) {
            if(File::exists($image->image)) {
                File::delete($image->image);
            }
        }
        

        Product::destroy($this->product_id);
        session()->flash("message", "Produk berhasil dihapus");
        $this->dispatch("close-modal");
    }

    public function render()
    {
        $products = Product::with(["category", "productImages"])->get();   
        
        return view('livewire.admin.product.index', 
        ["products" => $products]);
    }

}
