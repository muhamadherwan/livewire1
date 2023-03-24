<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $body;
    public $success = false;

    protected $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email',
            'body' => 'required'
    ];

    public function submit()
    {
//        $validatedData = $this->validate([
//            'name' => 'required|min:6',
//            'email' => 'required|email',
//            'body' => 'required',
//        ]);

//            Contact::create($validatedData);
//        return redirect()->to('/form');

        $this->validate();
        Contact::create($this->validate());

        $this->success = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
