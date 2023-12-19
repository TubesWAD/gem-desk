@extends('layouts.app')

@section('content')
    <h1 class="font-weight-bold justify-content-start">Ticket</h1>
    <br>
    <link href="{{asset('css/file_upload.css')}}" rel="stylesheet" />
        <div class="form-group">
            <label for=""><h2>
                    Title
                </h2></label>
            <input type="text" name="title" id="title" class="form-control" value="{{$ticket->title}}" placeholder="write title here...." aria-describedby="helpId" disabled>
        </div>
        <div class="form-group">
            <label for=""><h2>
                    Description
                </h2></label>
            <textarea class="form-control" name="description"  id="description" rows="3" placeholder="write description here...." disabled>{{$ticket->description}}</textarea>
        </div>


@endsection



