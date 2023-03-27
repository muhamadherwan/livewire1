<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class QuotationForm2 extends Component
{
    public $successMessage;
    public $categories = [];

    public function addNameField()
    {
        $this->categories[] = ['category' => '', 'item' => ''];
    }

    public function removeNameField($index)
    {
        unset($this->categories[$index]);
        $this->categories = array_values($this->categories);
    }


    public function submit()
    {
        $validatedData = $this->validate([
            'categories.*.category' => 'required',
            'categories.*.item' => 'required',
        ]);

        // Save the data to the database
        foreach ($this->categories as $category) {
            // Check if $category is an array or an object
            if (is_array($category) || is_object($category)) {
                // Save the category
                $newCategory = Category::create(['name' => $category['category']]);
                $newCategory->items()->create(['name' => $category['item']]);
            }
        }

        $this->successMessage = 'data is saved!';

        $this->categories = [];
    }

    public function render()
    {
        return view('livewire.quotation-form2');
    }
}
