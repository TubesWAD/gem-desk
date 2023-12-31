@extends('layouts.app')

@section('content')
@if (session('success'))
    <script>alert("{{ session('success') }}");</script>
@php
session()->forget('success');
@endphp
@endif
<section id="list">
    <a href="{{ route('assetManagement.index')}}" style="text-decoration: none;"><i class="bi bi-arrow-left-circle"></i> Back to Menu</a>
    <div class="d-flex">
        <h1 class="font-weight-bold justify-content-start">Product</h1>
        <div class="justify-content-end">
            <a class="btn btn-primary justify-content-end" href="{{ route('products.create')}}"><i class="bi bi-plus-lg"></i> Add Product</a>
        </div>
    </div>
    @if (count($products) > 0)
    <br>
    <table class="table text-center">
        <thead class="mb-3">
            <tr>
                <th>Name</th>
                <th>Property Of</th>
                <th>Product Type</th>
                <th>Manufacturer</th>
                <th>Cost</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->organization_name }}</td>
                <td>{{ $product->product_type }}</td>
                <td>{{ $product->manufacturer }}</td>
                <td>{{ $product->cost }}</td>
                <td>
                    <a name="show" id="show" href="{{ route('products.show', $product->id)}}" class="btn btn-success"><i class="bi bi-search"></i> View</a>
                    <a name="edit" id="edit" href="{{ route('products.edit', $product->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                    <a name="delete" id="delete" href="{{ route('products.delete', $product->id)}}?id={{ $product->id }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>Product isn't available</p>
    @endif 
</section>
@endsection
