<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{
    public $name;
    public $successMessage;

    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();
        Category::create($validatedData);

        $this->successMessage = 'Category is saved!';
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}
