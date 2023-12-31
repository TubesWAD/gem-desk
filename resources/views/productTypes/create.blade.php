@extends('layouts.app')

@section('content')
@if($organizations->isEmpty())
    <script>
        alert("No Organizations found. Redirecting...");
        window.location.href = "{{ route('organizations.index') }}";
    </script>
@endif
    <section>
    <div class="mb-3">
      <form action="{{ route('productTypes.store')}}" method="POST" enctype="multipart/form-data">
      <div class="container mt-4">
        <h1>New Product Type</h1>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
            </div>
            
            <div class="mb-3">
                <label for="product_type" class="form-label">Property of</label>
                <select class="form-control" id="organization_name" name="organization_name" aria-label="Default select example">
                    @foreach($organizations as $org)
                        <option value="{{ $org->organization_name }}">{{ $org->organization_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="asset_type" class="form-label">Asset Type</label>
                <select class="form-control" id="asset_type" name="asset_type" aria-label="Default select example">
                    <option selected>Asset</option>
                    <option value="1">Consumable</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="asset_category" class="form-label">Asset Category</label>
                <select class="form-control" id="asset_category" name="asset_category"  aria-label="Default select example">
                    <option selected>IT</option>
                    <option value="1">Non IT</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{ route('productTypes.index')}}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
  </section>
@endsection
