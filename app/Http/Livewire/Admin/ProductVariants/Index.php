<?php

namespace App\Http\Livewire\Admin\ProductVariants;

use App\Models\Product;
use App\Models\ProductVariant;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

use function Laravel\Prompts\error;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $name, $code, $size, $original_price, $selling_price, $quantity, $product_id, $productVariant_id;

    public function rules() {
        return [
            "name" => "nullable|string",
            "code" => "nullable|string",
            "size" => "nullable|string",
            "original_price" => "nullable",
            "selling_price" => "required|integer",
            "quantity" => "required|integer",
            "product_id" => "required|integer",
            // "id" => "required|integer",
        ];
    }

    public function resetInput() {
        $this->name = NULL;
        $this->code = NULL;
        $this->size = NULL;
        $this->original_price = NULL;
        $this->selling_price = NULL;
        $this->quantity = NULL;
        $this->product_id = NULL;
        $this->productVariant_id = NULL;
    }

    public function storeProductVariant() {
        $this->validate();
        try {
            ProductVariant::create([
                "name" => $this->name,
                "code" => $this->code,
                "size" => $this->size,
                "original_price" => $this->original_price,
                "selling_price" => $this->selling_price,
                "quantity" => $this->quantity,
                "product_id" => $this->product_id,
            ]);
            session()->flash("message", [
                "status" => 201,
               "message" => "Varian produk telah ditambahkan"
            ]);
        } catch(Exception $e) {
            session()->flash("message",
            [   "status" => 403,
                "message" => $e->getMessage()
            ]);

        }

        $this->dispatchBrowserEvent("close-modal");
        $this->resetInput();
    }  

      
    public function openModal() {
        $this->resetInput();
    }  

    public function closeModal() {
       $this->resetInput();
    }  

    public function editProductVariant(int $productVariant_id) {
        $this->productVariant_id = $productVariant_id;
        $productVariant= ProductVariant::findOrFail($productVariant_id);
        $this->name = $productVariant->name;
        $this->code = $productVariant->code;
        $this->size = $productVariant->size;
        $this->original_price = $productVariant->original_price;
        $this->selling_price = $productVariant->selling_price;
        $this->quantity = $productVariant->quantity;
        $this->product_id = $productVariant->product_id;
    }

    public function updateProductVariant() {
        $this->validate();

        try {
            ProductVariant::findOrFail($this->productVariant_id)->update([
                "name" => $this->name,
                "code" => $this->code,
                "size" => $this->size,
                "original_price" =>$this->original_price,
                "selling_price" =>$this->selling_price,
                "quantity" =>$this->quantity,
                "product_id" =>$this->product_id,
            ]);
            session()->flash("message", [
                "status" => 200,
                "message" => "Varian produk berhasil diedit"
            ]);
        } catch(Exception $e) {
            session()->flash("message", [
                "status" => 403,
                "message" => $e->getMessage()
            ]);
        }

        $this->dispatchBrowserEvent("close-modal");
        $this->resetInput();
    }  

    public function deleteProductVariant(int $productVariant_id) {
        $this->productVariant_id = $productVariant_id;
    }

    public function destroyProductVariant() {
        try {
            ProductVariant::findOrFail($this->productVariant_id)->delete();
            session()->flash("message", 
            [   "status" => 204,
                "message" => "Varian produk berhasil dihapus"
            ]);
        } catch(Exception $e) {
            session()->flash("message", 
            [   "status" => 403,
                "message" => $e->getMessage()
            ]);

        }
        $this->dispatchBrowserEvent("close-modal");
        $this->resetInput();
    }
    
    public function render()
    {
        $products = Product::all();
        $productVariants = ProductVariant::orderBy("id", "DESC")->paginate(10);

        return view('livewire.admin.product-variants.index',
                    ["products" => $products,
                    "productVariants" => $productVariants])->extends("layouts.admin")->section("wrapper");
    }
}
