@extends('layouts.app')

@section('content')
    <div class="d-flex">
        <h1 class="font-weight-bold justify-content-start">Edit Ticket</h1>
        <div class=" justify-content-end">
            @if($ticket->status == 'open')
                <form action="{{route('tickets.close', $ticket)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger " href="{{ route('tickets.index') }}">Close</button>
                </form>
            @elseif($ticket->status == 'closed')
                <form action="{{route('tickets.reopen', $ticket)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-info " href="{{ route('tickets.index') }}">Reopen</button>
                </form>
            @endif
        </div>
    </div>
    <br>
    <link href="{{asset('css/file_upload.css')}}" rel="stylesheet" />
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data" name="formName">
        @csrf
        @method('PATCH')
        <div class="form-group mb-3">
            <label for=""><h2>
                    Title
                </h2></label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title', $ticket->title)}}" placeholder="write title here...." aria-describedby="helpId">
        </div>
        <div class="form-group mb-3">
            <label for=""><h2>
                    Description
                </h2></label>
            <textarea class="form-control" name="description"  id="description" rows="3" placeholder="write description here....">{{old('description', $ticket->description)}}</textarea>
        </div>
        <div class="mb-3">
            <label for="ticketType" class="form-label"><h2>Ticket Type</h2></label>
            <div class="input-group">
                <select id="ticketType" name="ticketType" class="form-select">
{{--                    @foreach($ticketTypes as $ticketType => $value)--}}
{{--                        <option value="{{$ticketType}}"--}}
{{--                                @if ($ticketType == old('ticketType', $model->option))--}}
{{--                                    selected="selected"--}}
{{--                               @endif>--}}
{{--                            {{$value}}--}}
{{--                        </option>--}}
{{--                    @endforeach--}}
                    <option>Kebakaran</option>
                    <option>Internet Mati</option>
                </select>
                <a class="btn btn-outline-primary" href="#" role="button">No Types</a>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="upload-container">
                <div class="border-container">
                    <div class="icons fa-4x">
                        <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                        <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                        <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                    </div>
                    <input type="file" class="form-control-file" name="file" id="file_upload" placeholder=""
                           aria-describedby="fileHelpId">
                    <p>Drag and drop files here, or browse from computer
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for=""><h2>
                    Status
                </h2></label>
            <select class="form-control" disabled name="status" id="">
                <option value="{{$ticket->status}}" @selected(old('status'))>{{$ticket->status}}</option>
            </select>
        </div>
        <div class="form-group d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
    </form>
@endsection


