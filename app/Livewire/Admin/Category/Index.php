<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $category_id;

    public function deleteCategory(int $category_id) {
        $this->category_id = $category_id;
    }

    public function destroyCategory() {
        $category = Category::find($this->category_id);
        if(File::exists($category->image)) {
            File::delete($category->image);

        }

        $category->delete();
        session()->flash("message", "Category Deleted");
        $this->dispatch("close-modal");
    }

    public function render()
    {
        $categories = Category::orderBy("id", "DESC")->paginate(10);

        return view('livewire.admin.category.index', ["categories" => $categories]);
    }
}
