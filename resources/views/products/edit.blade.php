@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Item</h2>
        <form action="{{ route('products.update', $products->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $products->name }}" required>
            </div>

            <div class="form-group">
                <label for="product_type" class="form-label">Product Type:</label>
                <select class="form-control" id="product_type" name="product_type"  aria-label="Default select example" required>
                    @foreach($productTypes as $type)
                        <option value="{{ $type->name }}" {{ $type->name ? 'selected' : '' }} >{{ $type->name }}</option>
                    @endforeach
                </select>
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
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="description" required>{{ $products->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
