@extends('layouts.app')

@section('content')

    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Services</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>
                </div>
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

        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="row">
            
            <div class="col-md-6">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category:</strong>
                        <select name="service_categories" class="form-control">
                            <option value="Business Category">Business Category</option>
                            <option value="IT Category">IT Category</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Icon Upload:</strong>
                        <input type="file" name="iconUpload" class="form-control" placeholder="Icon Upload">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Owned By:</strong>
                        <select class="form-select" id="ownedBy" name="ownedBy" required>
                            <option value="owner1">Owner 1</option>
                            <option value="owner2">Owner 2</option>
                            <option value="owner3">Owner 3</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Service Support Hours:</strong>
                        <input type="text" name="serviceSupportHours" class="form-control" placeholder="Service Support Hours">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Cost:</strong>
                        <input type="text" name="cost" class="form-control" placeholder="cost">
                    </div>
                </div>
            </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            

           
        </form>
    </div>

@endsection
