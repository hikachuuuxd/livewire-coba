<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @if (session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form wire:submit.prevent="store">
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Nama Lengkap" wire:model="name" >
            <label for="floatingInput">Name</label>

            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>


        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" wire:model="email">
            <label for="floatingInput">Email address</label>

            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" wire:model="password">
            <label for="floatingPassword">Password</label>

            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button class="btn btn-primary my-3 px-3" >save</button>
    </form>

   
</div>
