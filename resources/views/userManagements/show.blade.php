@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h2>User Management</h2>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email}}" disabled>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name}}" disabled>
        </div>

        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="{{ $user->username}}" disabled>
        </div>

        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="text" class="form-control" name="employee_id" value="{{ $user->employee_id}}" disabled>
        </div>

        <div class="form-group">
            <label for="department">Department Name</label>
            <input type="text" class="form-control" name="department_name" value="{{ $user->department_name}} "
                   disabled>
        </div>

        <div class="form-group">
            <label for="roles">Roles</label>
            <input type="text" class="form-control" id="roles" name="roles" value="{{ $user->role}}" disabled>
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" name="mobile" value=" {{$user->mobile}}" disabled>
        </div>

        <a class="btn btn-secondary" href="{{ route('userManagements.index') }}">Back</a>
    </div>

@endsection