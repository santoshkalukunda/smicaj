<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    public $sent = false;
  

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
  
        Contact::create($validatedData);
        
        $this->sent = true;
  
        // return redirect()->back()-> with('success', "Your message");
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
