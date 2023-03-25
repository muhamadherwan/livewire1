<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Form1 extends Component
{
    public $employees = [];

    public function mount()
    {
        $this->employees = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function render()
    {
        return view('livewire.form1');
    }
}
