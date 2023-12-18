<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/file_upload.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>test HTML</title>
</head>
<body>
<div class="container">
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data" name="formName">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="inputName" class="col-sm-1-12 col-form-label">Title</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="title"  value="{{old('title', $ticket->title)}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-1-12 col-form-label">Description</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="description"  value="{{old('description', $ticket->description)}}">
            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <h1>Upload a file</h1>
                <div class="upload-container">
                    <div class="border-container">
                        <div class="icons fa-4x">
                            <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                            <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                            <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                        </div>
                        <input type="file" name="file" id="file-upload" class="form-control">
                        <p>Drag and drop files here, or browse from computer
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Action</button>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/file_upload.js') }}"></script>


</body>
</html>
