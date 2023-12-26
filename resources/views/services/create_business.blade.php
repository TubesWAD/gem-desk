@extends('layouts.app')

@section('content')

    <div>
        <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
        <div class="container mt-5">
            <h2 class="text-center mb-4">Business Service Category</h2>
        
            <div class="row">
            <!-- Right side of the form -->
            <div class="col-md-6">
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="serviceSupportHours" class="form-label">Service Support Hours:</label>
                    <input type="text" class="form-control" id="serviceSupportHours" name="serviceSupportHours" required>
                </div>
                <div class="mb-3">
                    <label for="businessImpact" class="form-label">Business Impact:</label>
                    <select class="form-select" id="businessImpact" name="businessImpact" required>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="incidentRestorationTarget" class="form-label">Incident Restoration Target:</label>
                    <textarea class="form-control" id="incidentRestorationTarget" name="incidentRestorationTarget" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="iconUpload" class="form-label">Upload Icon:</label>
                    <input type="file" class="form-control" id="iconUpload" name="iconUpload" accept="image/*">
                    <small class="form-text text-muted">Upload an image for the icon.</small>
                    </div>
                </form>
            </div>
        
            <!-- Left side of the form -->
            <div class="col-md-6">
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="availabilityTarget" class="form-label">Availability Target (%):</label>
                    <input type="text" class="form-control" id="availabilityTarget" name="availabilityTarget" required>
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Cost:</label>
                    <input type="text" class="form-control" id="cost" name="cost" required>
                </div>
                <div class="mb-3">
                    <label for="ownedBy" class="form-label">Owned By:</label>
                    <select class="form-select" id="ownedBy" name="ownedBy" required>
                    <option value="owner1">Owner 1</option>
                    <option value="owner2">Owner 2</option>
                    <option value="owner3">Owner 3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                </form>
            </div>
            </div>
        
            <!-- Save and Cancel buttons -->
            <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <button type="button" class="btn btn-primary me-2">Save</button>
                <a type="button" class="btn btn-secondary" href="/service/edit">Cancel</a>
            </div>
            </div>
        </div>
    </div>

@endsection
