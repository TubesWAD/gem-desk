@extends('layouts.app')

@section('content')
@if($productTypes->isEmpty())
        <script>
            alert("No product types found. Redirecting...");
            window.location.href = "{{ route('productTypes.index') }}";
        </script>
    @endif
    <section>
        <div class="mb-3">
            <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
                <div class="container mt-4">
                    <h1>New Product</h1>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    
                    <div class="mb-3">
                        <label for="product_type" class="form-label">Product Type</label>
                        <select class="form-control" id="product_type" name="product_type" aria-label="Default select example">
                            @foreach($productTypes as $type)
                                <option value="{{ $type->name }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="manufacturer" class="form-label">Manufacturer</label>
                        <input type="text" class="form-control" id="manufacturer" name="manufacturer">
                    </div>

                    <div class="mb-3">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                     </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{ route('products.index')}}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection
