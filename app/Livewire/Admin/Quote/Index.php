<?php

namespace App\Livewire\Admin\Quote;

use App\Models\Quote;

use Livewire\Component;
use Livewire\Attributes\Rule;

class Index extends Component
{
   
    protected $paginationTheme = 'bootstrap';
    
    public $quote_id;

    #[Rule('required|string')]
    public $author, $quote;
    
    public function storeQuote() {
        $validated = $this->validate();
        Quote::create([
            "author" => $validated["author"],
            "quote" => $validated["quote"],
        ]);

        session()->flash("message", "Quote Added Successfully");
        $this->dispatch("close-modal");
        $this->reset();
    }

    public function openModal() {
        $this->reset();
    }  

    public function closeModal() {
       $this->reset();
    }  

    public function editQuote(int $quote_id) {
        $this->quote_id = $quote_id;
        $quote = Quote::findOrFail($quote_id);
        $this->author = $quote->author;
        $this->quote = $quote->quote;

    }

    public function updateQuote() {
        $validated = $this->validate();
        Quote::findOrFail($this->quote_id)->update([
            "author" => $validated["author"],
            "quote" => $validated["quote"],
        ]);
        session()->flash("message", "Quote Updated Successfully");

        $this->dispatch("close-modal");
        $this->reset();

    }  
    
    public function deleteQuote(int $quote_id) {
        $this->quote_id = $quote_id;
    }

    public function destroyQuote() {
        Quote::findOrFail($this->quote_id)->delete();
        session()->flash("message", "Quote Deleted Successfully");
        $this->dispatch("close-modal");
        $this->reset();
    }

    public function render()
    {
        $quotes = Quote::all();
        return view('livewire.admin.quote.index')
                ->with([
                    "quotes" => $quotes
                ])
                ->extends("layouts.admin")->section("wrapper");
    }
}
