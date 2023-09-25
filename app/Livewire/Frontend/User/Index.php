<?php

namespace App\Livewire\Frontend\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $selected_province, $selected_city, $selected_subdisctrict;

    
    
    public function render()
    {
        $provinces = DB::table('tb_ro_provinces')->get();
        return view('livewire.frontend.user.index')
                ->with([
                    "provinces" => $provinces
                ])->extends("layouts.app")->section("main");
    }
}
