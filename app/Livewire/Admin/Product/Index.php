<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Support\Facades\File;

use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class Index extends Component
{
    use WithPagination;

    #[Locked]
    public $product_id;

   
    #[Url(as: 'q')] 
    public $search = null;


    public function query() {
        $this->resetPage();
    }
    public function deleteProduct(int $product_id) {
        $this->product_id  = $product_id;
        $this->dispatch("confirmDelete");
    }
    
    #[On("destroying")]
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
    }

    public function render()
    {
        $products = Product::with(["category", "productImages"]);   
        if($this->search) {
            $products->where("products.name", "like", "%". $this->search."%");
        }
        $products = $products->paginate(6);
        return view('livewire.admin.product.index', 
        ["products" => $products])->extends("layouts.admin")->section("wrapper");
    }

}
