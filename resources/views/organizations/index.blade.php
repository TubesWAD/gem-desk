@extends('layouts.app')

@section('content')
  <div>
    <h2>Organization List</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a type="submit" class="btn btn-primary btn-sm" href="{{route('organizations.create')}}" role="button">+ Add Organization</a>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role='alert' style="margin-top: 1%">
      <p>{{$message}}</p>
    </div>
    @endif
  </div>
  <br>

  <div>
    <table class="table table-striped table-hover">
      <thead class="table-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Organization Name</th>
          <th scope="col">Industry Category</th>
          <th scope="col">State</th>
          <th scope="col">Country</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      @foreach ($organization as $organization)
      <tbody>
        <tr>
          <th scope="row">{{++$i}}</th>
          <td>{{$organization -> organization_name}}</td>
          <td>{{$organization -> industry_category}}</td>
          <td>{{$organization -> city}}</td>
          <td>{{$organization -> country}}</td>
          <td>
            <a class="btn btn-success btn-sm" href="{{route ('organizations.show',$organization -> id)}}" role="button">Detail</a>
            <a class="btn btn-warning btn-sm" href="{{route ('organizations.edit',$organization -> id)}}" role="button">Edit</a>
            <a class="btn btn-danger btn-sm" href="{{route ('organizations.destroy',$organization -> id)}}" method="POST" role="button">Delete</a>

            @csrf
            @method ('DELETE')
          </td>
        </tr>
        </tbody>
        @endforeach
    </table>

    {!! $organization->links() !!}
  </div>
@endsection