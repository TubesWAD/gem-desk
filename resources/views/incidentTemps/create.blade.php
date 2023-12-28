@extends('layouts.app')

@section('content')
    <h1>Make Request Incident</h1>
    <br><br>
    <form action="{{ route('incidentTemps.store') }}" method="POST" enctype="multipart/form-data" name="formName">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger" >
                <div class="alert-heading">
                    <h4>Snapped!!</h4>
                </div>
                There are something wrong with your input.
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($message = Session::get('success'))
            <div class="alert alert-success" id="alert">
                {{ $message }}
            </div>
        @endif
        @if($message = Session::get('error'))
            <div class="alert alert-error" id="alert">
                {{ $message }}
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label" for="incident"><h2>Incident</h2></label>
            <input type="text" name="incident" id="incident" class="form-control" placeholder="write incident here....">
        </div>
        <div class="mb-3">
            <label class="form-label" for="service_id"><h2>Service</h2></label>
            <select class="form-select form-select-lg mb-3" name="service_id" aria-label="Large select example">
{{--                @foreach($services as $service)--}}
{{--                    <option value="{{$service->id}}">{{$service->name}}</option>--}}
{{--                @endforeach--}}
                <option value="Rendah">Test</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="probability"><h2>Probability</h2></label>
            <select class="form-select form-select-lg mb-3" name="probability" aria-label="Large select example">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="risk_quadrant"><h2>Risk Quadrant</h2></label>
            <select class="form-select form-select-lg mb-3" name="risk_quadrant" aria-label="Large select example">
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
            </select>
        </div>
        <div class="form-group d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
    </form>
@endsection




