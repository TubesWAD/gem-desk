@extends('layouts.app')
@section('content')
<h2>Leave Type</h2>
<a href="/create" type="submit" class="btn btn-primary" style="margin-bottom:1%">Add</a>
@if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert" style="margin-top: 1%">
    {{$message}}
  </div>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Maximum Duration (Days)</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody>
      @php
        $number = 1;   
      @endphp
      @foreach ($data as $row)
        <tr>
          <th scope="row">{{ $number++ }}</th>
          <td>{{ $row -> nameLeavetype}}</td>
          <td>{{ $row -> maxDuration}}</td>
          <td>
              <a href="/showdata/{{$row -> id}}" class="btn btn-warning" style="margin-right: 2%">Edit</a>
              <a href="/delete/{{$row -> id}}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      @endforeach



    </tbody>
  </table>
@endsection