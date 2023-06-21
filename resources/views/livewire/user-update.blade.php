<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form wire:submit.prevent="update">
        <input type="hidden" wire:model="userId">
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


          <button type="submit" class="btn btn-primary my-3 px-3" >update</button>
          <button  class="btn btn-secondary my-3 px-3" wire:click="back" >cancel</button>
    </form>

   
</div>
