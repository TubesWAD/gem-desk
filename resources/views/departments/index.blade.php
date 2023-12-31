@extends('layouts.app')

@section('content')
  <h2>PT Indofood Sukses Makmur</h2><br>
  <div class="card">

    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link " aria-current="true" href="http://127.0.0.1:8000/organization/show">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="false" href="#"><b>Department</b></a>
        </li>
      </ul>
    </div>
                  
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
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>PT Indofood Sukses Makmur</td>
                    <td>Makanan & minuman</td>
                    <td>Jakarta</td>
                    <td>Indonesia</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="/organization/show" role="button">Detail</a>
                        <a class="btn btn-warning btn-sm" href="#" role="button">Edit</a>
                        <a class="btn btn-danger btn-sm" href="#" role="button">Delete</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>PT Nestlé Indonesia</td>
                    <td>Makanan & minuman</td>
                    <td>Jakarta</td>
                    <td>Indonesia</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="#" role="button">Detail</a>
                        <a class="btn btn-warning btn-sm" href="#" role="button">Edit</a>
                        <a class="btn btn-danger btn-sm" href="#" role="button">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
@endsection