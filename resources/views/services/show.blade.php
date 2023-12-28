@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex align-items-center" style="border-bottom: 2px solid #ccc; padding-bottom: 0px; margin-bottom: 20px;">
            <a class="btn btn-primary" href="{{ route('services.index') }}" style="padding-bottom: 10px; margin-bottom: 15px; margin-right: 30px;">Back</a>
            <h2 style="padding-bottom: 10px; margin-bottom: 10px;">Show {{ $service->name }} Service</h2>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $service->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $service->description }}
            </div>
        </div>
    </div>
@endsection