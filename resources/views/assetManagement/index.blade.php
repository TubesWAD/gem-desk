@extends('layouts.app')

@section('content')
<h1 class="font-weight-bold d-flex justify-content-center">Asset Management</h1>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Product Type</h5>
                    <p class="card-text">Add new Product Type here</p>
                    <a href="{{ route('productTypes.index') }}" class="btn btn-primary">to Product Type</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Product</h5>
                    <p class="card-text">Add new Product here</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">to Product</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
