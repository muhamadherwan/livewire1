<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Form2 extends Component
{
    public $names = [];
    public $count = 1;
    public $successMessage;
    public $error = '';


    public function rules()
    {
        return [
            'names.*' => 'required|min:3|max:255',
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'names.*' => 'required|min:3|max:255',
        ]);
    }


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

    }


    public function render()
    {
        return view('livewire.form2');
    }
}
