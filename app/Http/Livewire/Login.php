<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }

    public $username;
    public $password;
 
    protected $rules = [
        'username' => 'required|min:6',
        'password' => 'required'
    ];

    protected $messages = [
        'username.min' => 'Username',
        'username.required' => 'Username is required',
        'password.required' => 'Password is required.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function Login()
    {
        $this->validate([
            'username' => 'min:6',
            
        ]);
  
    }
}
