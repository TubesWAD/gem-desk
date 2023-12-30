@extends('layouts.app')

@section('content')
  <h2>{{ $organization->organization_name }}</h2><br>

  <div class="d-grid gap-2 d-md-block">
    <a class="btn btn-primary" href="{{ route('organizations.index') }}" role="button">Back</a>
  </div>

  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="true" href="#"><b>Profile</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="true" href="http://127.0.0.1:8000/department">Department</a>
        </li>
      </ul>
    </div>
                  
    <div class="card-body">
      <h3 class="card-title">Description</h3>
      <p>{{ $organization->description }}</p><br>

      <h3 class="card-title">Industry Category</h3>
      <p>{{ $organization->industry_category }}</p><br>
      
      <h3 class="card-title">Address</h3>
      <p>{{ $organization->address }}</p><br>

      <h3 class="card-title">State</h3>
      <p>{{ $organization->state }}</p><br>

      <h3 class="card-title">Country</h3>
      <p>{{ $organization->country }}</p><br>
                    
      <h3 class="card-title">Contact Information</h3>
      <p>{{ $organization->email }}</p><br>
      
      @csrf
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('organizations.edit',$organization->id) }}" class="btn btn-primary">Edit Detail</a>
      </div>
    </div>
  </div>
@endsection