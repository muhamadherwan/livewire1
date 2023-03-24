<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $body;
//    public $success = false;
    public $successMessage;

    protected $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email',
            'body' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

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

//        $this->success = true;

        // if retun to same page after submit with flash message
//        $this->successMessage = 'Contact is saved!';
//        $this->resetForm();

        // if want to redirect ot other page with flash message
        session()->flash('message', 'Post successfully updated.');
        return redirect()->to('/');


    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->body = '';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
