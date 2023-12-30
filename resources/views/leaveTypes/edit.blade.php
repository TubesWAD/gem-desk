@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Change Leave Type</h2>
        <form action="{{route('leaveTypes.update', $leaveType->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('Patch')
            <div class="mb-3">
                <label for="namaLeaveTypeUpdate">Name Leaves Type</label>
                <input type="text" class="form-control" id="name" name="nameLeavetype"
                       value="{{$leaveType->name}}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsiLeaveTypeUpdate">Description</label>
                <input class="form-control" id="description" name="description" rows="3" value="{{$leaveType->description}}"
                       required>
            </div>

            <div class="mb-3">
                <label for="duartionLeaveTypeUpdate">Maximum Duration (Days)</label>
                <input type="number" class="form-control" id="maxDuration" name="max_duration"
                       value="{{$leaveType->max_duration}}" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('leaveTypes.index')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

@endsection