@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Show Item</h2>
        <form action="{{ route('productTypes.update', $productTypes->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $productTypes->name }}" disabled>
            </div>
            
            <div class="form-group">
                <label for="asset_type">Property Of:</label>
                <input type="text" class="form-control" name="asset_type" value="{{ $productTypes->organization_name }}" disabled>
            </div>

            <div class="form-group">
                <label for="asset_type">Asset Type:</label>
                <input type="text" class="form-control" name="asset_type" value="{{ $productTypes->asset_type }}" disabled>
            </div>
            
            <div class="form-group">
                <label for="asset_category">Asset Category:</label>
                <input type="text" class="form-control" name="asset_category" value="{{ $productTypes->asset_category }}" disabled>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" disabled>{{ $productTypes->description }}</textarea>
            </div>
            
            <a href="{{ route('productTypes.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
