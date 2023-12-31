@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Item</h2>
        <form action="{{ route('products.update', 'getProductTypesByOrganization', $products->id) }}" method="POST" id="editProductForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $products->name }}" required>
            </div>
            <div class="form-group">
                <label for="manufacturer">Manufacturer:</label>
                <input type="text" class="form-control" name="manufacturer" value="{{ $products->manufacturer }}" required>
            </div>

            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="text" class="form-control" name="cost" value="{{ $products->cost }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" name="description" required>{{ $products->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection

