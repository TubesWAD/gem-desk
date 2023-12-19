@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2>Create new Incident<br>
        </h2>
    </div>

    <div class="mb-3">
        <label for="IncidentInput" class="form-label">Incident</label>
        <input type="email" class="form-control" id="InsidenInput" placeholder="Incident Title">
    </div>

    <div class="mb-3">
        <label for="ServiceSelect" class="form-label">Impacted Service</label>
        <select class="form-select" id="ServiceSelect" aria-label="Impacted Service">
            <option selected>Not assigned</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="AssetSelect" class="form-label">Impacted Asset</label>
        <select class="form-select" id="AssetSelect" aria-label="Impacted Asset">
            <option selected>Not assigned</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="ProbabilitySelect" class="form-label">Incident Probability</label>
        <select class="form-select" aria-label="Incident Probability">
            <option selected>Not assigned</option>
            <option value="1">Low (Incident may occur once in a year)</option>
            <option value="2">Medium (Incident may occur once in 3 months)</option>
            <option value="3">High (Incident may occur once a month)</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="ImpactSelect" class="form-label">Impact Intensity</label>
        <select class="form-select" aria-label="Impacted Intensity">
            <option selected>Not assigned</option>
            <option value="1">Low (Service is unavailable for < 6 hours)</option>
            <option value="2">Medium (Service is unavailable for 6 - 24 hours)</option>
            <option value="3">High (Service is unavailable for more than 24 hours)</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="IncidentInput" class="form-label">Incident Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
    </div>
@endsection

