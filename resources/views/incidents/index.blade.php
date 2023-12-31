@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2>Incident Records<br>
        </h2>
    </div>

    <div class="mb-3">
        <a href="{{ route('incidents.create') }}" class="btn btn-primary">Add Incident</a>
    </div>

    <div class="mb-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Incident</th>
                    <th>Service Impacted</th>
                    <th>Asset</th>
                    <th>Probability</th>
                    <th>Risk Impact</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $incident)
                @php
                    $number = 1;
                @endphp
                <tr>
                    <td>{{ $number++}}</td>
                    <td>{{ $incident->incident }}</td>
                    <td>{{ $incident->service }}</td>
                    <td>{{ $incident->asset }}</td>
                    <td>{{ $incident->probability }}</td>
                    <td>{{ $incident->risk_impact }}</td>
                    <td class="{{ getPriorityClass($incident->priority) }}">{{ $incident->priority }}</td>
                    <td>
                        <form action="{{ route('incidents.destroy', $incident->id)}}" method="POST">
                            <a class="btn btn-success" href="{{ route('incidents.show', $incident->id) }}">Show</a>
                            <a class="btn btn-danger" href="{{ route('incidents.edit', $incident->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@php
function getPriorityClass($priority) {
    switch ($priority) {
        case 'Low':
            return 'table-success'; // Green background
        case 'Medium':
            return 'table-warning'; // Yellow background
        case 'High':
            return 'table-danger'; // Red background
        default:
            return '';
    }
}
@endphp
