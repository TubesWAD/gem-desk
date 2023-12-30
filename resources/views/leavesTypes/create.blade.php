@extends('layouts.app')

@section('content')
    
  <div class="container mt-5">
    <h2>Add New Leave Type</h2>
    <form action="{{ route('leavesTypes.store')}}" method="POST">
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
        <label for="durationLeaveType">Status</label>
        <select class="form-select" name="status" aria-label="Default select example">
          <option selected>Status</option>
          <option value="approved">Approve</option>
          <option value="unapproved">Unapprove</option>
        </select> 
      </div>

      <button type="submit" class="btn btn-primary">Add</button>
      <a href="{{route('leavesTypes.index')}}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>

@endsection


