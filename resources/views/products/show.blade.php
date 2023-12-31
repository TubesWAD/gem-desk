@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Show Item</h2>
        <form action="{{ route('products.update', $products->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $products->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="asset_type">Property Of:</label>
                <input type="text" class="form-control" name="asset_type" value="{{ $products->organization_name }}" disabled>
            </div>

            <div class="form-group">
                <label for="product_type">Product Type:</label>
                <input type="text" class="form-control" name="product_type" value="{{ $products->product_type }}" disabled>
            </div>

            <div class="form-group">
                <label for="manufacturer">Manufacturer:</label>
                <input type="text" class="form-control" name="manufacturer" value="{{ $products->manufacturer }}" disabled>
            </div>

            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="text" class="form-control" name="cost" value="{{ $products->cost }}" disabled>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" disabled>{{ $products->description }}</textarea>
            </div>
            
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
