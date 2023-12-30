@extends('layouts.app')

@section('content')
    
  <div class="container mt-5">
    <h2>Edit User Management</h2>
    <form action="{{ route('userManagements.update', $user->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}" required>
      </div>

      <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" class="form-control"  name="username" value="{{old('username', $user->username)}}" required>
      </div>

      <div class="form-group">
        <label for="employee_id">Employee ID</label>
        <input type="text" class="form-control" name="employee_id" value="{{old('employee_id', $user->employee_id)}}">
      </div>

      <div class="form-group">
        <label for="department">Department Name</label>
        <input type="text" class="form-control"  name="department_name" value="{{old('department_name', $user->department_name)}}">
      </div>

      @role('admin')
      <div class="form-group">
        <label for="roles">Roles</label>
        <input type="text" class="form-control" id="roles" name="roles" value="{{old('role', $user->role)}}" required>
      </div>
       @endrole

      <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="text" class="form-control" name="mobile" value="{{old('mobile', $user->mobile)}}" required>
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