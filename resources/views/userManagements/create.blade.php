@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Add User</h2>
    <form action="{{ route('userManagements.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Name:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="employee_id">Employee ID:</label>
            <input type="text" class="form-control" id="employee_id" name="employee_id" required>
        </div>
        <div class="form-group">
            <label for="department">Department Name:</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <div class="form-group">
            <label for="roles">Roles:</label>
            <select class="form-control" id="roles" name="roles" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" class="form-control" id="mobile" name="mobile" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="retype_password">Retype Password:</label>
            <input type="password" class="form-control" id="retype_password" name="retype_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-secondary" href="/view">Cancel</a>
    </form>
</div>

@endsection