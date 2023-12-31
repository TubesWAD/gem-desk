@extends('layouts.app')

@section('content')
    <h1>Add User</h1>
    <br>
    <div class="container">
        <form action="{{ route('userManagements.store') }}" method="POST">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger" >
                    <div class="alert-heading">
                        <h4>Snapped!!</h4>
                    </div>
                    There are something wrong with your input.
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="employee_id">Employee ID</label>
                <input type="text" class="form-control" id="employee_id" name="employee_id" required >
            </div>

            <div class="form-group">
                <label for="department">Department Name</label>
                <input type="text" class="form-control" id="department_name" name="department_name" required>
            </div>


            @role('admin')
            <div class="form-group">
                <label for="roles">Roles</label>
                <select class="form-control" id="roles" name="roles" >
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            @endrole

            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" >
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" name="profile_picture">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-secondary" href="{{ route('userManagements.index') }}">Cancel</a>
        </form>
    </div>

@endsection
@push('script')
@endpush
