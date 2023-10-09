<?php

namespace App\Livewire\Admin\FlashSale;

use App\Models\FlashSale;
use App\Models\Product;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;


class Index extends Component
{
    use WithFileUploads;


    private $uploadPath = 'uploads/flashsale/';

    #[Locked]
    public $products, $flash_sale_id;

    #[Rule("required")]
    public $product_id = NULL, $price = 0, $deadline, $isActive = false;

    public $previous_image1, $previous_image2;

    #[Rule('nullable|image|max:1024')]
    public $image1, $image2;

    public function mount() {
        $this->products = Product::whereDoesntHave("flashSale")->get();
    }

    public function storeFlashSale() {
        $validated = $this->validate();
        
        $validated["deadline"] = $this->getValidDate($validated["deadline"]);
        if($this->image1) {
            $image1 = $this->getValidFileName($validated["image1"], $validated["product_id"]);
            $this->image1->storeAs($this->uploadPath, $image1, "public_uploads");
            $validated["image1"] = "{$this->uploadPath}{$image1}";
        }
        
        if($this->image2) {
            $image2 = $this->getValidFileName($validated["image2"],  $validated["product_id"]);
            $this->image2->storeAs($this->uploadPath, $image2, "public_uploads");
            $validated["image2"] = "{$this->uploadPath}{$image2}";
        }

        FlashSale::create($validated);
        
        session()->flash("message", [
            "status" => "success",
            "text" => "Berhasil menambahkan flash sale"
        ]);
        $this->dispatch("close-modal");
    }

    public function editFlashSale(int $flashSaleId) {
        $flashSale = FlashSale::find($flashSaleId);
        $this->products->push(Product::find($flashSale->product_id));
        $this->flash_sale_id = $flashSaleId;
        $this->product_id = $flashSale->product_id;
        $this->price = $flashSale->price;
        $this->deadline = $flashSale->deadline;
        $this->isActive = $flashSale->isActive === 1 ? true : false;

        if($flashSale->image1) {
            $this->previous_image1 = $flashSale->image1;
        }
        if($flashSale->image2) {
            $this->previous_image2 = $flashSale->image2;
        }

    }

    public function updateFlashSale() {

        // dd($this->image1);
        $validated = $this->validate();

        try {
            $flashSale = FlashSale::findOrFail($this->flash_sale_id);
            $flashSale->product_id = $validated["product_id"];
            $flashSale->price = $validated["price"];
            $flashSale->deadline = $this->getValidDate($validated["deadline"]);
            $flashSale->isActive = $this->isActive;
            
            //jika ada gambar
            if($validated["image1"]) {
                if(File::exists($this->previous_image1)) {
                    File::delete($this->previous_image1);
                }
                $image1 = $this->getValidFileName($validated["image1"], $validated["product_id"]);
                $this->image1->storeAs($this->uploadPath, $image1, "public_uploads");
                $flashSale->image1 = "{$this->uploadPath}{$image1}";
            }

            if($validated["image2"]) {
                if(File::exists($this->previous_image2)) {
                    File::delete($this->previous_image2);
                }
                $image2 = $this->getValidFileName($validated["image2"], $validated["product_id"]);
                $this->image2->storeAs($this->uploadPath, $image2, "public_uploads");
                $flashSale->image2 = "{$this->uploadPath}{$image2}";
            }

            $flashSale->save();
            $this->dispatch("close-modal");

        } catch(Exception $error) {
            session()->flash("message", [
                "status" => "failed",
                "text" => $error->getMessage()
            ]);
        }
    }

    public function deleteFlashSale(int $flashSaleId) {
        try {
            $check = FlashSale::findOrFail($flashSaleId);
            $this->flash_sale_id = $check->id;
            $this->previous_image1 = $check->image1;
            $this->previous_image2 = $check->image2;

        } catch(Exception $error) {
            session()->flash("message", [
                "status" => "failed",
                "text" => $error->getMessage()
            ]);
        }
    }

    public function destroyFlashSale() {
        try {
            if(File::exists($this->previous_image1)) {
                File::delete($this->previous_image1);
            }

            if(File::exists($this->previous_image2)) {
                File::delete($this->previous_image2);
            }
            FlashSale::destroy($this->flash_sale_id);
            $this->dispatch("close-modal");
            session()->flash("message", [
                "status" => "success",
                "text" => "Flash Sale berhasil dihapus"
            ]);
         } catch(Exception $error) {
            session()->flash("message", [
                "status" => "failed",
                "text" => $error->getMessage()
            ]);
        }
    }
    public function render()
    {
        
        $flashSaleProducts = FlashSale::with("product")->get();
        return view('livewire.admin.flash-sale.index')
                ->with([
                    "flashSaleProducts" => $flashSaleProducts
                ])
            ->extends("layouts.admin")->section("wrapper");
    }

    #[On("close-modal")]
    public function closeModal() {
        $this->reset("product_id", "price", "deadline", "isActive", "image1", "image2", "previous_image1", "previous_image2");
    }

    private function getValidFileName($validatedImage, $productId) {
        $extension = $validatedImage->getClientOriginalExtension();
        $random = Str::random(4);
        $nameFile = "{$productId}-" . time() . "-{$random}.{$extension}";
        return $nameFile;
    }

    private function getValidDate($validatedDate) {
        $timestamp = strtotime($validatedDate);
        $deadline =  date("Y-m-d H:i", $timestamp);
        return $deadline;
    }
}
