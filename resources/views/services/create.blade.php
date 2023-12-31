@extends('layouts.app')

@section('content')

    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb d-flex align-items-center"
                 style="border-bottom: 2px solid #ccc; padding-bottom: 0px; margin-bottom: 20px;">
                <a class="btn btn-primary" href="{{ route('services.index') }}"
                   style=" margin-bottom: 15px; margin-right: 30px;">Back</a>
                <h2 style="padding-bottom: 10px; margin-bottom: 10px;">Add New Service</h2>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Category:</strong>
                            <select name="service_categories" class="form-control">
                                <option value="Business Category">Business Category</option>
                                <option value="IT Category">IT Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Asset:</strong>
                            <select name="asset" class="form-control">
                                @forelse($products as $product)
                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                @empty
                                    <option value="" >There's no product</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" style="height:110px" name="description"
                                      placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Icon Upload:</strong>
                            <input type="file" name="file" class="form-control" placeholder="Icon Upload">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Owned By:</strong>
                            <select name="owned" class="form-control">
                                @forelse($organizations as $org)
                                    <option value="{{ $org->organization_name }}">{{ $org->organization_name }}</option>
                                @empty
                                    <option value="" >There's no organization</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Service Support Hours:</strong>
                            <input type="text" name="hours" class="form-control" placeholder="Service Support Hours">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <label for="availabilityTarget" class="form-label">Availability Target (%):</label>
                        <input type="number" class="form-control" id="availabilityTarget" name="availability"
                               placeholder="Availability Target">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Cost:</strong>
                            <input type="text" name="cost" class="form-control" placeholder="cost">
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>


        </form>
    </div>

@endsection
