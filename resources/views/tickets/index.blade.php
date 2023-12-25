@extends('layouts.app')

@section('content')
    <div class="d-flex">
        <h1 class="font-weight-bold justify-content-start">Tickets</h1>
        <div class="justify-content-end">
            <a class="btn btn-primary " href="{{ route('tickets.create' ) }}">Create + </a>
        </div>
    </div>
    <br>
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade shadow" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade shadow" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div>
        <form action="{{ route('tickets.index') }}" method="GET">
            <div class="d-flex justify-content-end">
                <div class="input-group mb-3  w-25">
                    <input type="text" class="form-control" placeholder="Search..." name="q" id="search" autocomplete="off">
                </div>
            </div>
        </form>
        <table class="table" >
            <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Type</th>
                <th>Status</th>
                <th class="d-flex justify-content-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($tickets as $index => $ticket)
                <tr>
                    <td>{{$index + $tickets->firstItem()}}</td>
                    <td>{{$ticket->title}}</td>
                    <td>{{$ticket->description}}</td>
                    <td>{{$ticket->ticket_type}}</td>
                    <td>{{$ticket->status}}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-success me-1" href="{{ route('tickets.show', $ticket->id) }}">Show</a>
                        <a class="btn btn-primary me-1" href="{{ route('tickets.edit', $ticket->id) }}">Edit</a>
                        <form action="{{route('tickets.destroy', $ticket->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger me-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <div class="d-flex justify-content-center">
                            No Record Found
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="mt-3" style="text-align: center;">
            {{  $tickets->withQueryString()->links() }}
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('#search').on('keyup',function() {
            var query = $(this).val();
            if(query !== ''){
                $.ajax({
                    url:"{{ route('tickets.index') }}",
                    type:"GET",
                    data:{'query':query},
                    success:function (data) {
                        $('tbody').empty().html(data);
                    }
                })
            }
            else{
                $('tbody').empty();
                @foreach($tickets as $index => $ticket)
                $('tbody').append(`
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->ticket_type }}</td>
                        <td>{{ $ticket->status }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-success me-1" href="{{ route('tickets.show', $ticket->id) }}">Show</a>
                            <a class="btn btn-primary me-1" href="{{ route('tickets.edit', $ticket->id) }}">Edit</a>
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger me-1">Delete</button>
                        </form>
                       </td>
                    </tr>`
                );
                @endforeach
            }
        });
    </script>
@endpush
