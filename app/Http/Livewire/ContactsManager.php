<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactsManager extends Component
{
    public $contacts;

    protected $rules = [
        'contacts.*.name' => 'required',
        'contacts.*.email' => 'required'
    ];

    public function render()
    {
        return view('livewire.contacts-manager');
    }

    public function mount()
    {
        $this->contacts = Contact::all();
    }

    public function add(){
        $this->contacts->push(new Contact());
    }

    public function save()
    {
        $this->validate();
        foreach($this->contacts as $contact)
        {
            $contact->save();
        }
        session()->flash('success', 'data save');
    }

    public function delete($index)
    {
        $contact = $this->contacts[$index];
        $this->contacts->forget($index);

        $contact->delete();
        session()->flash('success', 'data deleted');
    }
}
