<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use Livewire\Component;

class HeaderCategory extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.frontend.header-category', [
            "categories" => $categories
        ]);
    }
}
