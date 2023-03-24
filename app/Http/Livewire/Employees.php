<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Validation\Rule;


class Employees extends Component
{
//    public $employees, $name, $email, $employee_id;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
    // ai fix
    public $name = [];
    public $email = [];

    public function rules()
    {
        return [
            'name.*' => 'required',
            'email.*' => [
                'required',
                'email',
                Rule::requiredIf(function () {
                    // Custom validation rule that ensures at least one item is non-blank
                    return collect($this->name)->concat($this->email)->filter(function ($value) {
                            return !empty(trim($value));
                        })->count() > 0;
                }),
            ],
        ];
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        $this->employees = Employee::all();
        return view('livewire.employees');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
    }


    public function store()
    {
        // Check if any of the input fields are non-blank
        $hasNonBlankFields = collect($this->name)->concat($this->email)->filter(function ($value) {
                return !empty(trim($value));
            })->count() > 0;

        if ($hasNonBlankFields) {
            $validatedData = $this->validate();

            foreach ($this->name as $key => $value) {
                if (!empty(trim($value)) && !empty(trim($this->email[$key]))) {
                    Employee::create(['name' => $value, 'email' => $this->email[$key]]);
                }
            }

            $this->resetInputFields();

            session()->flash('message', 'Employee Has Been Created Successfully.');
        } else {
            session()->flash('error', 'Please enter at least one name and email address.');
        }
    }

}
