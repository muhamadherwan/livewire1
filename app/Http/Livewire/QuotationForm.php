<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Contact;
use Livewire\Component;

class QuotationForm extends Component
{
    public $contactName;
    public $categoryFirst;
    public $categories = [];
    public $count = 1;
    public $successMessage;

    public function rules()
    {
        return [
            'contactName' => 'required|min:3|max:255',
            'categoryFirst' => 'required|min:3|max:255',
            'categories.*' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'contactName.required' => 'This Contact name is required.',
            'categories.*.required' => 'This Category name is required.',
            'categories.*.min' => 'This Category name must be at least 3 characters',
            'categoryFirst.required' => 'This Category name is required.',
            'categoryFirst.min' => 'This Category name must be at least 3 characters',
        ];
    }

    public function addNameField()
    {
        $this->count = count($this->categories) + 1;
        array_push($this->categories, '');
    }

    public function removeNameField($index)
    {
        unset($this->categories[$index]);
        $this->count--;
        $this->resetErrorBag('names.' . $index);
    }

    public function submit()
    {
        $this->validate();

        $hasInput = false;

        if (!empty(trim($this->contactName))) {
            $hasInput = true;
            Contact::create(['name' => $this->contactName]);
        }

        if (!empty(trim($this->categoryFirst))) {
            $hasInput = true;
            Category::create(['name' => $this->categoryFirst]);
        }

        foreach ($this->categories as $category) {
            if (!empty(trim($category))) {
                $hasInput = true;
                Category::create(['name' => $category]);
            }
        }

        $this->categories = [];
        $this->count = 1;

//        session()->flash('message', 'Name successfully saved.');
//        $this->successMessage = 'data is saved!';

        if ($hasInput) {
            $this->successMessage = 'Data is saved!';
        }

        // clear the form data only if there are no errors
        if (!$this->getErrorBag()->hasAny()) {
            $this->contactName = '';
            $this->categoryFirst = '';
            $this->categories = [];
            $this->count = 1;
        }
    }

    public function render()
    {
        return view('livewire.quotation-form');
    }
}


