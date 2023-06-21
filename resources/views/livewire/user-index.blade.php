<div>
  <div class="row">
    @if (session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($cancel)
       @livewire('user-create')
    @elseif($userUpdate)
      @livewire('user-update')
    @else
     @livewire('user-create')
    @endif
</div>
    {{-- Stop trying to control. --}}
    <div class="row mt-3">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
        @if (count($users) == 0)
        <tr>
            <td colspan="5" class="text-center">Data user tidak ditemukan</td>
        </tr>
       @else
        @foreach ($users as $user)

          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>
                <button class="badge bg-danger text-decoration-none" wire:click="destroy({{ $user->id }})">hapus</button>
                <button class="badge bg-primary text-decoration-none" wire:click="getUser({{ $user->id }})">edit</button>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
</div>
