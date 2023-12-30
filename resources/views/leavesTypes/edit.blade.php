@extends('layouts.app')

@section('content')
    
  <div class="container mt-5">
    <h2>Change Leave Type</h2>
    <form action="" method="POST">
      @csrf
      <div class="mb-3">
        <label for="namaLeaveTypeUpdate">Name Leaves Type</label>
        <input type="text" class="form-control" id="nameLeavetype" name="nameLeavetype" value="{{$data->nameLeavetype}}" required>
      </div>

      <div class="mb-3">
        <label for="deskripsiLeaveTypeUpdate">Description</label>
        <input class="form-control" id="description" name="description" rows="3" value="{{$data->description}}" required>
      </div>

      <div class="mb-3">
        <label for="duartionLeaveTypeUpdate">Maximum Duration (Days)</label>
        <input type="number" class="form-control" id="maxDuration" name="maxDuration" value="{{$data->maxDuration}}" required>
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
      <a href="/view" class="btn btn-secondary">Cancel</a>
    </form>
  </div>

@endsection


