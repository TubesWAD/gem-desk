@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Item</h2>
        <form action="{{ route('productTypes.update', $productTypes->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="name" value="{{ $productTypes->name }}" required>
            </div>

            <div class="form-group">
                <label for="product_type" class="form-label">Property of:</label>
                <select class="form-control" id="organization_name" name="organization_name"  aria-label="Default select example" required>
                    @foreach($organizations as $org)
                    <option value="{{ $org->organization_name }}" {{ $org->organization_name == $productTypes->organization_name ? 'selected' : '' }}>{{ $org->organization_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="asset_type" class="form-label">Asset Type:</label>
                <select class="form-control" id="asset_type" name="asset_type" aria-label="Default select example" required>
                    <option value="Asset" {{ $productTypes->asset_type == 'Asset' ? 'selected' : '' }} >Asset</option>
                    <option value="Consumable" {{ $productTypes->asset_type == 'Consumable' ? 'selected' : '' }} >Consumable</option>
                </select>
            </div>

            <div class="form-group">
                <label for="asset_category" class="form-label">Asset Category:</label>
                <select class="form-control" id="asset_category" name="asset_category"  aria-label="Default select example" required>
                    <option value="IT" {{ $productTypes->asset_category == 'IT' ? 'selected' : '' }} >IT</option>
                    <option value="Non IT" {{ $productTypes->asset_category == 'Non IT' ? 'selected' : '' }} >Non IT</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="description" required>{{ $productTypes->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('productTypes.index') }}" class="btn btn-danger">Cancel</a>

        </form>
    </div>
@endsection
