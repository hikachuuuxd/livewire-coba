<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    public $userUpdate = false;
    public $reset = false;
    public $paginate = 5;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    protected $listeners = [
        'userStored' => 'handleStored',
        'userUpdated' => 'handleUpdated', 
        'cancelUpdate' => 'cancelUpdate'
    ];
    public function render()
    {
        return view('livewire.user-index', [
    
            'users' => $this->search == null ?
                User::latest()->paginate($this->paginate) :
                User::latest()->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }
    
    public function handleStored($user)
    {
         session()->flash('status', 'Berhasil menambahkan ' . $user['name'] );
    }

    public function getUser($id){
        $this->reset = false;
        $this->userUpdate = true;
        $user = User::find($id);
        $this->emit('getUser', $user);
    }

    public function handleUpdated($user)
    {
       session()->flash('status', 'berhasil di update');
       $this->userUpdate = false;
    }

    public function cancelUpdate($reset){
        $this->userUpdate = false;
        $this->reset = $reset;
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
