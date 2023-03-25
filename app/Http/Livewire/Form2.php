<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Form2 extends Component
{
    public $nameD;
    public $names = [];
    public $count = 1;
    public $successMessage;

    public function rules()
    {
        return [
            'nameD' => 'required|min:3|max:255',
            'names.*' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'names.*.required' => 'This name field is required.',
            'names.*.min' => 'This name field must be at least 3 characters',
            'nameD.required' => 'This name field is required.',
            'nameD.min' => 'This name field must be at least 3 characters',
        ];
    }

//    public function updated($field)
//    {
//        $this->validateOnly($field, [
//            'names.*' => 'required|min:3|max:255',
//        ]);
//    }


    public function addNameField()
    {
//        $this->count++;
//        array_push($this->names, '');
        $this->count = count($this->names) + 1;
        array_push($this->names, '');
    }

    public function removeNameField($index)
    {
        unset($this->names[$index]);
        $this->count--;
        $this->resetErrorBag('names.'.$index);
    }

    public function submit()
    {
        $this->validate();
//        foreach ($this->names as $name) {
//            Category::create(['name' => $name]);
//        }

        $hasName = false;

        if (!empty(trim($this->nameD))) {
            $hasName = true;
            Category::create(['name' => $this->nameD]);
        }

        foreach ($this->names as $name) {
            if (!empty(trim($name))) {
                $hasName = true;
                Category::create(['name' => $name]);
            }
        }

        $this->names = [];
        $this->count = 1;

//        session()->flash('message', 'Name successfully saved.');
//        $this->successMessage = 'data is saved!';

        if ($hasName) {
            $this->successMessage = 'Data is saved!';
        }

        // clear the form data only if there are no errors
        if (!$this->getErrorBag()->hasAny()) {
            $this->nameD = '';
            $this->names = [];
            $this->count = 1;
        }
    }


    public function render()
    {
        return view('livewire.form2');
    }
}
