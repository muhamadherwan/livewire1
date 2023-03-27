<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Contact;
use Livewire\Component;

class QuotationForm extends Component
{
//    public $catChildItemFirst;
    public $categories = [];
    public $count = 1;
    public $itemFirst;
    public $categoryFirst;
    public $contactName;
    public $successMessage;


    public function rules()
    {
        $rules = [
            'categories.*' => 'required|min:3|max:255',
            'categoryFirst' => 'required|min:3|max:255',
            'contactName' => 'required|min:3|max:255',
            'itemFirst' => 'required|min:3|max:255',
//            'catChildItemFirst' => 'required|min:3|max:255',

        ];

//        if ($this->categoryFirst) {
//            $rules['catChildItemFirst'] = 'required|min:3|max:255';
//        }
//
//        // Only validate the field if it hasn't been removed
//        foreach ($this->categories as $index => $category) {
//            if (isset($this->categories[$index])) {
//                $rules['categories.'.$index] = 'required|min:3|max:255';
//            }
//        }

        return $rules;
    }

    public function messages()
    {
        return [
            'categories.*.required' => 'This Category name is required.',
            'categories.*.min' => 'This Category name must be at least 3 characters',
            'itemFirst.required' => 'This Item name is required.',
            'itemFirst.min' => 'This Item name must be at least 3 characters',
            'categoryFirst.required' => 'This Category name is required.',
            'categoryFirst.min' => 'This Category name must be at least 3 characters',
            'contactName.required' => 'This Contact name is required.',
//            'catChildItemFirst.required' => 'This Item name is required.',
//            'catChildItemFirst.min' => 'This Item name must be at least 3 characters',
        ];
    }

    public function addNameField()
    {
        $this->count = count($this->categories) + 1;

        // clear error message for the last category field
        $errorBag = $this->getErrorBag();
        $errorBag->forget('categories.' . count($this->categories));

        array_push($this->categories, '');
    }

    public function removeNameField($index)
    {
        $errorBag = $this->getErrorBag();
        $errorBag->forget('categories.' . $index);
        $this->resetValidation('categories.' . $index);
        unset($this->categories[$index]);
        $this->categories = array_values($this->categories); // re-index the array
        $this->count--;

        // reset error from removed category
        $errorBag->forget('categories.' . ($index + 1));
    }

    public function submit()
    {
        $this->validate();

//        $hasInput = false;

//        if (!empty(trim($this->contactName))) {
//            $hasInput = true;
            Contact::create(['name' => $this->contactName]);
//        }

        $category1st = Category::create(['name' => $this->categoryFirst]);
        $category1st->items()->create(['name' => $this->itemFirst]);
//
        foreach ($this->categories as $category) {
            if (!empty(trim($category))) {
//                $hasInput = true;
                Category::create(['name' => $category]);
            }
        }
//
//        $this->categories = [];
//        $this->count = 1;

//        session()->flash('message', 'Name successfully saved.');
        $this->successMessage = 'data is saved!';

//        if ($hasInput) {
//            $this->successMessage = 'Data is saved!';
//        }

        // clear the form data only if there are no errors
//        if (!$this->getErrorBag()->hasAny()) {
            $this->itemFirst = '';
            $this->categoryFirst = '';
            $this->contactName = '';

//            $this->catChildItemFirst = '';


            $this->categories = [];
            $this->count = 1;
//        }

    }

    public function render()
    {
        return view('livewire.quotation-form');
    }
}


