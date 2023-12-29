@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>User Management</h2>
    
    <a type="submit" class="btn btn-primary" href="{{route('userManagements.create')}}">Add User</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role='alert' style="margin-top: 1%">
      {{$message}}
    </div>
    @endif
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
          @php
            $number = 1;
          @endphp
          @foreach ($data as $row)
          <tr>
            <th scope="row">{{$number++}}</th>
            <td>{{$row -> name}}</td>
            <td>{{$row -> username}}</td>
            <td>{{$row -> email}}</td>
            <td>{{$row -> employee_id}}</td>
            <td>{{$row -> department_name}}</td>
            <td>{{$row -> roles}}</td>
            <td>{{$row -> mobile}}</td>
            <td>{{$row -> description}}</td>
            <td class="d-flex">
              <button type="submit" class="btn btn-info mr-2" href="/show/{{$row -> id}}">Show</button>
              <button type="button" class="btn btn-warning" href="/edit/{{$row -> id}}">Edit</button>
              <button type="button" class="btn btn-danger ml-2" href="/delete/{{$row -> id}}">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection