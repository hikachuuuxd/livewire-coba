<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class UserUpdate extends Component
{
    public $userId;
    public $name;
    public $email;
    public $reset = false;
  

    protected $listeners = [
        'getUser' => 'showUser',
    ];
    public function render()
    {
        return view('livewire.user-update');
    }

    public function showUser($user){

        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->email = $user['email'];

    }

    
    public function update(){

    if($this->reset == true){
        $this->back();
    }else{
        $this->validate([
            'name' => 'required', 
            'email' => 'required'
        ]);
    
        if($this->userId){
            $user = User::find($this->userId);
            $user->update([
                'name' => $this->name, 
                'email' => $this->email,
            ]);

            $this->resetInput();
            $this->emit('userUpdated', $user);
           

        }
    }
 
    }

    private function resetInput(){
        $this->userId = null;
        $this->email = null;
        $this->name = null;
    }

    public function back(){
        $reset = $this->reset = true;
        $this->emit('cancelUpdate', $reset);
    }

}
