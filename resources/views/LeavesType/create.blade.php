@extends('layouts.app')

@section('content')
    
  <div class="container mt-5">
    <h2>Add New Leave Type</h2>
    <form action="/insertdata" method="HEAD">
      @csrf
      <div class="mb-3">
        <label for="namaLeaveType">Name Leaves Type</label>
        <input type="text" class="form-control" id="namaLeaveType" name="nameLeavetype" required>
      </div>

      <div class="mb-3">
        <label for="deskripsiLeaveType">Description</label>
        <input class="form-control" id="deskripsiLeaveType" name="description" rows="3" required>
      </div>

      <div class="mb-3">
        <label for="durationLeaveType">Maximum Duration</label>
        <input type="number" class="form-control" id="duartionLeaveType" name="maxDuration" required>
      </div>

      <div class="mb-3">
        <label for="durationLeaveType">Maximum Duration</label>
        <select class="form-select" aria-label="Default select example">
          <option selected>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Add</button>
      <a href="/view" class="btn btn-secondary">Cancel</a>
    </form>
  </div>

@endsection


