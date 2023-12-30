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
                    <th>Id</th>
                    <th>Incident</th>
                    <th>Service Impacted</th>
                    <th>Asset</th>
                    <th>Probability</th>
                    <th>Risk Impact</th>
                    <th>Priority</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $incident)
                <tr>
                    <td>{{ $incident->id }}</td>
                    <td>{{ $incident->incident }}</td>
                    <td>{{ $incident->service }}</td>
                    <td>{{ $incident->asset }}</td>
                    <td>{{ $incident->probability }}</td>
                    <td>{{ $incident->risk_impact }}</td>
                    <td>{{ $incident->priority }}</td>
                    <td>{{ $incident->created_at }}</td>
                    <td>{{ $incident->updated_at }}</td>
                    <td>
                        <form action="{{ route('incidents.destroy', $incident->id)}}" method="POST">
                            <a class="btn btn-success" href="{{ route('incidents.show', $incident->id) }}">Show</a>
                            <a class="btn btn-primary"href="{{ route('incidents.edit', $incident->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection