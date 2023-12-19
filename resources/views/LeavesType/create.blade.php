@extends('layouts.app')

@section('content')
    
  <div class="container mt-5">
    <h2>Add New Leave Type</h2>
    <form acti>
      <div class="mb-3">
        <label for="namaRoles" class="form-label">Name Leaves Type</label>
        <input type="text" class="form-control" id="namaRoles" name="name" required>
      </div>

      <div class="mb-3">
        <label for="deskripsiRoles" class="form-label">Description</label>
        <textarea class="form-control" id="deskripsiRoles" name="description" rows="3" required></textarea>
      </div>

      <div class="mb-3">
        <label for="colorInput" class="form-label">Select Color Status</label>
        <input type="color" id="colorInput" class="form-control" name="colorInput" value="#ff0000" style="max-width: 70px;" required>
      </div>

      

      <button type="submit" class="btn btn-primary">Save</button>
      <button type="submit" class="btn btn-secondary">Cancel</button>
    </form>
  </div>

@endsection


