<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Type\NullType;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.user-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required', 
            'email' => 'unique:users,email|required', 
            'password' => 'required'
        ]);

        $user =  User::create([
            'name' => $this->name, 
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $this->resetInput();
        $this->emit('userStored', $user);

    }


    private function resetInput()
    {
        $this->name = NULL;
        $this->email = NULL;
        $this->password = NULL;
    }
}
