@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2>Create new Incident<br>
        </h2>
    </div>

    <form action="{{ route('incidents.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="IncidentInput" class="form-label">Incident</label>
            <input type="text" class="form-control" name="incident" id="IncidentInput" placeholder="Incident Title">
            <small class="text-muted">Enter a descriptive title for the incident.</small>
        </div>

        <div class="mb-3">
            <label for="ServiceSelect" class="form-label">Impacted Service</label>
            <select class="form-select" name="service" id="ServiceSelect" aria-label="Impacted Service">
                @forelse($services as $service)
                    <option value="{{ $service->name }}">{{ $service->name }}</option>
                @empty
                    <option value="" >There's no service</option>
                @endforelse
            </select>
            <small class="text-muted">You can select a service that has been previously defined in the Service Catalog.</small>
        </div>

        <div class="mb-3">
            <label for="AssetSelect" class="form-label">Impacted Asset</label>
            <select class="form-select" name="asset" id="AssetSelect" aria-label="Impacted Asset">
                @forelse($assets as $product)
                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                @empty
                    <option value="" >There's no product</option>
                @endforelse
            </select>
            <small class="text-muted">You can select an asset that has been previously defined in the Asset Management.</small>
        </div>

        <div class="mb-3">
            <label for="ProbabilitySelect" class="form-label">Incident Probability</label>
            <select class="form-select" name="probability" id="ProbabilitySelect" aria-label="Incident Probability">
                <option selected>Not assigned</option>
                <option value="Low">Low (Incident may occur once in a year)</option>
                <option value="Medium">Medium (Incident may occur once in 3 months)</option>
                <option value="High">High (Incident may occur once a month)</option>
            </select>
            <small class="text-muted">It refers to how often will the incident happen, this parameter is used to calculate and determine the priority of the incident.</small>
        </div>

        <div class="mb-3">
            <label for="ImpactSelect" class="form-label">Impact Intensity</label>
            <select class="form-select" name="risk_impact" id="ImpactSelect" aria-label="Impacted Intensity">
                <option selected>Not assigned</option>
                <option value="Low">Low (Service is unavailable for < 6 hours)</option>
                <option value="Medium">Medium (Service is unavailable for 6 - 24 hours)</option>
                <option value="High">High (Service is unavailable for more than 24 hours)</option>
            </select>
            <small class="text-muted">It refers to how severe is the impact of the incident to its related, this parameter is used to calculate and determine the priority of the incident.</small>
        </div>

        <div class="mb-3">
            <label for="DescriptionInput" class="form-label">Incident Description</label>
            <textarea class="form-control" name="incident_desc" id="DescriptionInput" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('incidents.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>

@endsection
