<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{
    public $name;
//    public $fields = [];


//    public $rules = [];
    public $rows = [];
    public $cat1;
//    public $rules = [
//        'rows.*.name' => 'required',
//    ];

    public function addRow()
    {
        $this->rows[] = [
            'name' => '',
        ];
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows);
    }

//    public function store()
//    {
//        $this->validate([
//            'category.*.name' => 'required',
//        ]);
//
//        foreach ($this->employees as $employee) {
//            Category::create([
//                'name' => $employee['name']
//            ]);
//        }
//
//        session()->flash('message', 'Category have been added successfully.');
//
//        $this->reset();
//    }

    public function save()
    {
//        $validatedData = $this->validate($this->rules);

        $this->validate([

            'cat1' => 'required',
            'rows.*.name' => 'required',
        ]);

        Category::create($this->cat1);

        foreach ($this->rows as $row) {
//            if (!empty(trim($row['name']))) {
                // Save row to database
                Category::create([
                    'name' => $row['name'],
                ]);
//            }
        }

        // Reset the form
        $this->rows = [];
        $this->rules = [];

        session()->flash('message', 'Form submitted successfully!');
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}
