@extends('layouts.app')

@section('content')
  <h2>{{ $organization->organization_name }}</h2>

  <div class="d-grid gap-2 d-md-block">
    <a class="btn btn-primary" href="{{ route('organizations.index') }}" role="button">Back</a>
  </div>
  <br>

  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="true" href="#"><b>Profile</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="true" href="{{ route('departments.index') }}">Department</a>
        </li>
      </ul>
    </div>
                  
    <div class="card-body">
      <h3 class="card-title">Description</h3>
      <p>{{ $organization->description }}</p><br>

      <h3 class="card-title">Industry Category</h3>
      <p>{{ $organization->industry_category }}</p><br>
      
      <h3 class="card-title">Address</h3>
      <p>{{ $organization->address }}, {{ $organization->city }}, {{ $organization->postal_code }}</p><br>

      <h3 class="card-title">State</h3>
      <p>{{ $organization->state }}</p><br>

      <h3 class="card-title">Country</h3>
      <p>{{ $organization->country }}</p><br>
                    
      <h3 class="card-title">Contact Information</h3>
      <p>
          - Email: {{ $organization->email }}<br>
          - Phone Number: {{ $organization->phone_no }}<br>
          - Fax Number: {{ $organization->fax_no }}<br>
          - Web url: {{ $organization->web_url }}
      </p>
      <br>
      
      @csrf
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('organizations.edit',$organization->id) }}" class="btn btn-primary">Edit Detail</a>
      </div>
    </div>
  </div>
@endsection