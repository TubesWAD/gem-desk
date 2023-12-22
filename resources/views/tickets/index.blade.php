@extends('layouts.app')

@section('content')
    <div class="d-flex">
        <h1 class="font-weight-bold justify-content-start">Tickets</h1>
        <div class=" justify-content-end">
            <a class="btn btn-primary " href="{{ route('tickets.create' ) }}">Create + </a>
        </div>
    </div>
    <br>

    <table class="table">
        <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Type</th>
            <th>Status</th>
            <th class="d-flex justify-content-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$ticket->title}}</td>
            <td>{{$ticket->description}}</td>
            <td>{{$ticket->ticket_type}}</td>
            <td>{{$ticket->status}}</td>
            <td class="d-flex justify-content-center">
                <form action="{{route('tickets.destroy', $ticket->id)}}" method="post">
                <a class="btn btn-success me-1" href="{{ route('tickets.show', $ticket->id) }}">Show</a>
                <a class="btn btn-primary me-1" href="{{ route('tickets.edit', $ticket->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger me-1">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
