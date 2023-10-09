<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Index extends Component
{
    #[Locked]
    public $carts;
    public $provinces, $cities, $subdistricts;

    public $selectedProvince =NULL, $selectedCity = NULL, $selectedSubdistrict =  NULL;

    public function mount() {
        //cari cart berdasarkan auth

        $cartsData = Cart::join('product_variants', 'product_variants.id', '=', 'carts.product_variant_id')
                        ->join("products", "products.id", "=", "carts.product_id")
        ->select('carts.id','products.name', 'carts.quantity', 'product_variants.size', 'product_variants.selling_price')
        ->get();
        $cartsData->each(function($item) {
            $item["total_price"] = $item["selling_price"] * $item["quantity"]; 
        });
        $this->carts = $cartsData;
        $this->provinces = DB::table('tb_ro_provinces')->get();
        
    }

    public function updatedSelectedProvince($province) {
    dd("Test");
        if(!is_null($province)) {
            $this->cities = DB::table('tb_ro_cities')->where("province_id", $province)->get();
            $this->selectedCity = NULL;
        }
    }
    
    public function render()
    {
        // $subdistricts = DB::table("tb_ro_subdistricts")->where("city_id", $this->selected_city)->get();
        return view('livewire.frontend.checkout.index')->extends("layouts.app")->section("main");
    }
}
