@extends('layouts.app')

@section('content')
    <h2>Leave Type</h2>
    <a href="{{route('leaveTypes.create')}}" type="submit" class="btn btn-primary" style="margin-bottom:1%">Add</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert" style="margin-top: 1%">
            {{$message}}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Maximum Duration (Days)</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
        @forelse ($leaveTypes as $index => $leaveType)
            <tr>
                <th scope="row">{{ 1 }}</th>
                <td>{{ $leaveType->name}}</td>
                <td>{{ $leaveType->max_duration}}</td>
                <td> {{ $leaveType->status }} </td>
                <td>
                    <form action="" method="post">
                        @csrf
                        @method('PATCH')
                        <a type="submit" class="btn btn-success" href="">
                            Approve
                        </a>
                    </form>
                    <a href="" class="btn btn-info"style="margin-right: 2%">Show</a>
                    <a class="btn btn-danger me-1" href="">Delete</a>
                    <form id="" action="" method="post">
                        @csrf
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    <div class="d-flex justify-content-center">
                        No Record Found
                    </div>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection