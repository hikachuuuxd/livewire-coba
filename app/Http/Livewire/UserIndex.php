<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    protected $listeners = [
        'userStored' => 'handleStored'
    ];
    public function render()
    {
        return view('livewire.user-index', [
            'users' => User::get()
        ]);
    }

    public function handleStored($user)
    {
        session()->flash('status', 'Berhasil menambahkan ' . $user['name'] );
    }
}
