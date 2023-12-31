@extends('layouts.app')

@section('content')
  <h2>Add Department</h2>
  <hr>
    <form class="row g-3">
    @csrf
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Department Name</label>
            <input type="text" class="form-control form-control-sm" id="inputEmail4">
        </div>

        <div class="col-md-6"> 
            <label for="inputPassword4" class="form-label">Bussiness Impact</label>
            <select id="inputState" class="form-select form-select-sm">
            <option selected>Choose...</option>
                <option>Low</option>
                <option>Medium</option>
                <option>High</option>
            </select>
        </div>
        <br>

        <div class="col-12">
            <label for="inputAddress" class="form-label">Description</label>
            <textarea class="form-control form-control-sm" id="deptDesc" rows="3"></textarea>
        </div>
        <br>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="submit">Save</button>
            <button class="btn btn-outline-secondary" type="reset">Reset</button>
        </div>
    </form>
@endsection