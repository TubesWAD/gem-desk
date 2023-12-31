@extends('layouts.app')

@section('content')
    <h1 class="font-weight-bold justify-content-start">Ticket</h1>
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
    <br>
    <link href="{{asset('css/file_upload.css')}}" rel="stylesheet" />
        <div class="mb-3">
            <label class="form-label" for="title"><h2>Title</h2></label>
            <input type="text" name="title" id="title" class="form-control" value="{{$ticket->title}}" placeholder="write title here...." aria-describedby="helpId" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label" for="description"><h2>Description</h2></label>
            <textarea class="form-control" name="description"  id="description" rows="3" placeholder="write description here...." disabled>{{$ticket->description}}</textarea>
        </div>
        @role('admin')
        <form action="{{ route('tickets.createMessage', $ticket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="message"><h2>Solution</h2></label>
                <textarea class="form-control" name="message"  id="message" rows="3" placeholder="write solution here...."></textarea>
            </div>
            <div class="form-group d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        @endrole
        @if($ticket->solutions->count() > 0)
            @foreach($ticket->solutions as $solution)
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="card-text">{{$solution->messages}}</p>
                    </div>
                </div>
            @endforeach
        @endif


@endsection



