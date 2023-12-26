@extends('layouts.app')

@section('content')

<div>
    <ul class="nav nav-pills mb-5">
        {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('services.show')}}">Service Catalog</a>
        </li> --}}
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('services.index') }}">Service Categories</a>
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('services.create') }}"> Create New Service</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-striped table-hover">
      <tr>
          <th>No</th>
          <th>Name</th>
          <th>Description</th>
          <th width="280px">Action</th>
      </tr>
      @foreach ($services as $service)
      <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $service->name }}</td>
          <td>{{ $service->description }}</td>
          <td>
              <form action="{{ route('services.destroy',$service->id) }}" method="POST">
 
                  <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>
  
                  <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>
 
                  @csrf
                  @method('DELETE')
    
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>
          </td>
      </tr>
      @endforeach
  </table>
      
</div>
  
  

@endsection
