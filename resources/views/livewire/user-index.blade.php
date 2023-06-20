<div>
    {{-- Stop trying to control. --}}
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
                <a href="" class="badge bg-danger text-decoration-none">hapus</a>
                <a href="" class="badge bg-primary text-decoration-none">edit</a>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
</div>
