@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>User Management</h2>
    
    <button type="button" class="btn btn-primary">Add User</button>
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
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Lee Haechan</td>
            <td>echan</td>
            <td>echan@gmail.com</td>
            <td>1202213000</td>
            <td>Finance</td>
            <td>User</td>
            <td>085870260776</td>
            <td>To Manage Financial</td>
            <td class="d-flex">
              <button type="button" class="btn btn-info mr-2">Show</button>
              <button type="button" class="btn btn-warning">Edit</button>
              <button type="button" class="btn btn-danger ml-2">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
</div>

@endsection