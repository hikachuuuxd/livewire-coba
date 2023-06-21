<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{

    public $userUpdate = false;
    public $cancel = false;

    protected $listeners = [
        'userStored' => 'handleStored',
        'userUpdated' => 'handleUpdated', 
        'cancelUpdate' => 'backCreate'
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

    public function getUser($id){
        $this->cancel = false;
        $this->userUpdate = true;
        $user = User::find($id);
        $this->emit('getUser', $user);
    }

    public function handleUpdated($user)
    {
       session()->flash('status', 'berhasil di update');
       $this->userUpdate = false;
    }

    public function backCreate($reset){
        $this->userUpdate = false;
        $this->cancel = $reset;
    }

    public function destroy($id){
        if($this->userUpdate == true){
            session()->flash('status', 'tidak bisa menghapus data');
        }else{
            User::destroy($id);
            session()->flash('status', 'dihapus');

        }
        
    }
}
