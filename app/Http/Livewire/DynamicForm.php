<?php

namespace App\Http\Livewire;

use App\Models\DynamicFormData;
use Livewire\Component;

class DynamicForm extends Component
{
    public $rows = [];
    public $rules = [];

    protected $validationAttributes = [
        'rows.*.name' => 'name',
        'rows.*.email' => 'email',
    ];

    public function addRow()
    {
        $this->rows[] = [
            'name' => '',
            'email' => '',
        ];
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows);
    }

    public function submit()
    {
        $validatedData = $this->validate($this->rules);

        foreach ($this->rows as $row) {
            if (!empty(trim($row['name'])) && !empty(trim($row['email']))) {
                DynamicFormData::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                ]);
            }
        }

        // Reset the form
        $this->rows = [];
        $this->rules = [];

        session()->flash('message', 'Form submitted successfully!');
    }

    public function mount()
    {
        $this->rows[] = [
            'name' => '',
            'email' => '',
        ];

        $this->rules = [
            'rows.*.name' => 'required',
            'rows.*.email' => 'required|email',
        ];
    }

    public function render()
    {
        return view('livewire.dynamic-form');
    }
}
