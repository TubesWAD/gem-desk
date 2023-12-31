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
        <h1 class="font-weight-bold justify-content-start">Product Type</h1>
            <div class="justify-content-end">
                <a class="btn btn-primary" href="{{ route('productTypes.create')}}"><i class="bi bi-plus-lg"></i> Add Product Type</a>
            </div>
    </div>
    @if (count($productTypes) > 0)
    <br>
    <table class="table text-center">
        <thead class="mb-3">
            <tr>
                <th>Name</th>
                <th>Property Of</th>
                <th>Asset Type</th>
                <th>Asset Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($productTypes as $productType)
            <tr>
                <td>{{ $productType->name }}</td>
                <td>{{ $productType->organization_name }}</td>
                <td>{{ $productType->asset_type }}</td>
                <td>{{ $productType->asset_category }}</td>
                <td>
                    <a name="show" id="show" href="{{ route('productTypes.show', $productType->id)}}" class="btn btn-success"><i class="bi bi-search"></i> View</a>
                    <a name="edit" id="edit" href="{{ route('productTypes.edit', $productType->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                    <a name="delete" id="delete" href="{{ route('productTypes.delete', $productType->id)}}?id={{ $productType->id }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>Product Type isn't available</p>
    @endif
</section>
@endsection