@extends('layouts.app')

@section('content')
    <h1>User Management</h1>
    @role('admin')
    <a type="submit" class="btn btn-primary" href="{{route('userManagements.create')}}">Add User</a>
    @endrole
    <br>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role='alert' id="alert" style="margin-top: 1%">
                {{$message}}
            </div>
        @endif

        <form action="{{ route('userManagements.index') }}" method="GET">
            <div class="d-flex justify-content-end">
                <div class="input-group mb-3  w-25">
                    <input type="text" class="form-control" placeholder="Search..." name="q" id="search"
                           autocomplete="off">
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Department Name</th>
                <th scope="col">Roles</th>
                <th scope="col">Mobile</th>
                <th scope="col" class="d-flex justify-content-center">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <th scope="row">{{$index + $users->firstItem()}}</th>
                    <td>{{$user -> name}}</td>
                    <td>{{$user -> username}}</td>
                    <td>{{$user -> email}}</td>
                    <td>{{$user -> employee_id}}</td>
                    <td>{{$user -> department_name}}</td>
                    <td>{{$user -> roles}}</td>
                    <td>{{$user -> mobile}}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-success me-1" href="{{ route('userManagements.show', $user->id) }}">Show</a>
                        @role('admin')
                        <a class="btn btn-primary me-1" href="{{ route('userManagements.edit', $user->id) }}">Edit</a>
                        <a class="btn btn-danger me-1" href="#" onclick="event.preventDefault();
                  if(confirm('Do you want to delete this?')){
                      document.getElementById('delete-row-{{ $user->id }}').submit();
                  }">Delete</a>
                        <form id="delete-row-{{$user->id}}" action="{{route('userManagements.destroy', $user->id)}}"
                              method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                        </form>
                        @endrole

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-3" style="text-align: center;">
            {{  $users->withQueryString()->links() }}
        </div>
    </div>

@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('#search').on('keyup', function () {
            var query = $(this).val();
            if (query !== '') {
                $.ajax({
                    url: "{{ route('userManagements.index') }}",
                    type: "GET",
                    data: {'query': query},
                    success: function (data) {
                        $('tbody').empty().html(data);
                    }
                })
            } else {
                $('tbody').empty();
                @foreach($users as $index => $user)
                $('tbody').append(`
          <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->employee_id }}</td>
              <td>{{ $user->department_name }}</td>
              <td>{{ $user->roles }}</td>
              <td>{{ $user->mobile }}</td>
              <td class="d-flex justify-content-center">
                  <a class="btn btn-success me-1" href="{{ route('userManagements.show', $user->id) }}">Show</a>
                  @role('admin')
                  <a class="btn btn-primary me-1" href="{{ route('userManagements.edit', $user->id) }}">Edit</a>
                  <form action="{{ route('userManagements.destroy', $user->id) }}" method="post">
                  @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger me-1">Delete</button>
                    </form>
                    @endrole
                </td>
            </tr>`
                );
                @endforeach
            }
        });
    </script>
@endpush
