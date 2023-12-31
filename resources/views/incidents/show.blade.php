@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2>Show Incident Details<br></h2>
    </div>

    <div class="mb-3">
        <label for="IncidentInput" class="form-label">Incident</label>
        <input type="text" class="form-control" value="{{ $incident->incident }}" name="incident" id="IncidentInput" placeholder="Incident Title" disabled>
    </div>

    <div class="mb-3">
        <label for="ProbabilitySelect" class="form-label">Incident Probability</label>
        <select class="form-select" name="probability" id="ProbabilitySelect" aria-label="Incident Probability" disabled>
            <option value="Low" {{ $incident->probability === 'Low' ? 'selected' : '' }}>Low (Incident may occur once in a year)</option>
            <option value="Medium" {{ $incident->probability === 'Medium' ? 'selected' : '' }}>Medium (Incident may occur once in 3 months)</option>
            <option value="High" {{ $incident->probability === 'High' ? 'selected' : '' }}>High (Incident may occur once a month)</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="ImpactSelect" class="form-label">Impact Intensity</label>
        <select class="form-select" name="risk_impact" id="ImpactSelect" aria-label="Impacted Intensity" disabled>
            <option value="Low" {{ $incident->risk_impact === 'Low' ? 'selected' : '' }}>Low (Service is unavailable for < 6 hours)</option>
            <option value="Medium"{{ $incident->risk_impact === 'Medium' ? 'selected' : '' }}>Medium (Service is unavailable for 6 - 24 hours)</option>
            <option value="High" {{ $incident->risk_impact === 'High' ? 'selected' : '' }}>High (Service is unavailable for more than 24 hours)</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="DescriptionInput" class="form-label">Incident Description</label>
        <textarea class="form-control" name="incident_desc" id="DescriptionInput" rows="4" disabled>{{ $incident->incident_desc }}</textarea>
    </div>

    <div class="mb-3">
        <a href="{{ route('incidents.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
