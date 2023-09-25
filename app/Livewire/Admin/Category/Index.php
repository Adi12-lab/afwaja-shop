<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;

use Illuminate\Support\Facades\File;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $category_id;

    #[Url(as: 'q')] 
    public $search = null;


    public function query() {
        $this->resetPage();
    }

    public function deleteCategory(int $category_id) {
        $this->category_id = $category_id;
        $this->dispatch("confirmDelete");
    }

    #[On("destroying")]
    public function destroyCategory() {
        $category = Category::find($this->category_id);
        if(File::exists($category->image)) {
            File::delete($category->image);

        }
        $category->delete();
        $this->dispatch("alert", message: [
            "title" => "Berhasil",
            "text" => "Kategori {$category->name} berhasil dihapus", 
            "icon" => "success"
        ]);
    }

    public function render()
    {
        $categories = Category::orderBy("id", "DESC");
        if($this->search) {
            $categories->where("categories.name", "like", "%". $this->search."%");
        }

        $categories = $categories->paginate(5);

        return view('livewire.admin.category.index', ["categories" => $categories])
                ->extends("layouts.admin")
                ->section("wrapper");
    }
}
