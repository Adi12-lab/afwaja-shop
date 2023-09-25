<?php

namespace App\Livewire\Admin\ProductVariants;

use App\Models\Product;
use App\Models\ProductVariant;
use Exception;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

use function Laravel\Prompts\error;

class Index extends Component
{
    protected $paginationTheme = "bootstrap";

    #[Locked]
    public $product_id;
    
    public $name, $code, $size, $original_price, $selling_price, $quantity, $productVariant_id;

    public function mount(int $id) {
        $this->product_id = $id;
    }

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
            ]);
           $this->dispatch("alert", message: [
            "title" => "Berhasil",
            "icon" => "success",
            "text" => "Produk berhasil ditambahkan"
           ]);
        } catch(Exception $e) {
            $this->dispatch("alert", message: [
                "title" => "Error",
                "icon" => "error",
                "text" => $e->getMessage()
               ]);

        }

        $this->dispatch("close-modal");
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
            ]);
            $this->dispatch("alert", message: [
                "title" => "Berhasil",
                "icon" => "success",
                "text" => "Produk berhasil diedit"
               ]);
        } catch(Exception $e) {
            $this->dispatch("alert", message: [
                "title" => "Error",
                "icon" => "error",
                "text" => $e->getMessage()
               ]);
        }

        $this->dispatch("close-modal");
        $this->resetInput();
    }  

    public function deleteProductVariant(int $productVariant_id) {
        $this->productVariant_id = $productVariant_id;
        $this->dispatch("confirmDelete");
    }

    #[On("destroying")]
    public function destroyProductVariant() {
        try {
            ProductVariant::findOrFail($this->productVariant_id)->delete();
            $this->dispatch("alert", message: [
                "title" => "Berhasil",
                "icon" => "success",
                "text" => "Produk varian berhasil dihapus"
               ]);
        } catch(Exception $e) {
            $this->dispatch("alert", message: [
                "title" => "Error",
                "icon" => "error",
                "text" => $e->getMessage()
               ]);

        }
    }
    
    public function render()
    {
        $productVariants = ProductVariant::orderBy("id", "DESC")->where("product_id", $this->product_id)->get();

        return view('livewire.admin.product-variants.index',
                    ["productVariants" => $productVariants])
                    ->extends("layouts.admin")
                    ->section("wrapper");
    }
}
