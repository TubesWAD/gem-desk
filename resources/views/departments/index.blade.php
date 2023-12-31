@extends('layouts.app')

@section('content')
{{--  <h2>{{ $organization->organization_name }}</h2><br>--}}
    <h2>Department</h2>
  <div class="card">

    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
{{--        <li class="nav-item">--}}
{{--          <a class="nav-link " aria-current="true" href="{{ route('organizations.show',$organization->id) }}">Profile</a>--}}
{{--        </li>--}}
        <li class="nav-item">
          <a class="nav-link active" aria-current="false" href="#"><b>Department</b></a>
        </li>
      </ul>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>

    @if ($message = Session::get('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>{{ $message }}</div>
    </div><br>
    @endif

    @if($message = Session::get('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div>{{ $message }}</div>
    </div><br>
    @endif

    <div class="card-body">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="/organization/create" role="button">+ Add Department</a>
        </div>

        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">State</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach ($departments as $department)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $department->department_name }}</td>
                    <td>{{ $department->description }}</td>
                    <td>{{ $department->department_head }}</td>
                    <td>
                      <form action="{{ route('departments.destroy',$department->id) }}" method="POST">
                        <a class="btn btn-success btn-sm" href="{{ route ('departments.show',$department->id) }}" role="button">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ route ('departments.edit',$department->id) }}" role="button">Edit</a>
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </table>

{{--        <div clas="d-flex justify-content-start">--}}
{{--          {{ $departments->links() }}--}}
{{--        </div>--}}
    </div>
  </div>
@endsection
