@extends('layouts.app')

@section('content')
    <h1>Add Ticket</h1>
    <br>
    <link href="{{asset('css/file_upload.css')}}" rel="stylesheet" />
    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" name="formName">
        @csrf
        <div class="form-group mb-3">
            <label for=""><h2>
                    Title
                </h2></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="write title here...." aria-describedby="helpId">
        </div>
        <div class="form-group mb-3">
            <label for=""><h2>
                    Description
                </h2></label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="write description here...."></textarea>
        </div>
        <div class="form-group mb-3">
            <div class="upload-container">
                <div class="border-container">
                    <div class="icons fa-4x">
                        <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                        <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                        <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                    </div>
                    <input type="file" class="form-control" name="file" id="file_upload" placeholder=""
                           aria-describedby="fileHelpId">
                    <p>Drag and drop files here, or browse from computer
                </div>
            </div>
        </div>


        <div class="form-group d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
    </form>
@endsection


{{--<script src="{{ asset('js/file_upload.js') }}"></script>--}}

