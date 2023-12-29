@extends('layouts.app')

@section('content')
    
  <div class="container mt-5">
    <h2>Edit User Management</h2>
    <form action="/edit/{{$data->id}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="nama">Name</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$data->name}}" required>
      </div>

      <div class="form-group">
        <label for="employee_id">Employee ID</label>
        <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{$data->employee_id}}" required>
      </div>

      <div class="form-group">
        <label for="department">Department Name</label>
        <input type="text" class="form-control" id="department" name="department" value="{{$data->department_name}}" required>
      </div>

      <div class="form-group">
        <label for="roles">Roles</label>
        <input type="text" class="form-control" id="roles" name="roles" value="{{$data->roles}}" required>
      </div>

      <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="text" class="form-control" id="mobile" name="mobile" value="{{$data->mobile}}" required>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{$data->description}}" required>
      </div>

      
      <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{$data->username}}" required>
      </div>
      
      <div class="mb-3">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" name="password" value="{{$data->password}}" required>
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
      <a class="btn btn-secondary" href="/view">Cancel</a>
    </form>
  </div>

@endsection