@extends('layouts.app')

@section('content')

<div>

    <strong style="font-size:2em; display: block; line-height: 1.5;">
        Service Categories
    </strong>
    <br>

    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a class="btn btn-success" href="{{ route('services.create') }}"> Create New Service</a>
                <form action="{{ route('services.index') }}" method="GET">
                    <div class="input-group" style="width: 300px;">
                      <input type="text" class="form-control" placeholder="Search..." name="q" id="search" autocomplete="off">
                    </div>
                </form>
            </div>
        </div>
      </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $index => $service)
            
            <tr>
                <td>{{ $index + $services->firstItem() }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->description }}</td>
                <td>
                    <form action="{{ route('services.destroy',$service->id) }}" method="POST" enctype="multipart/form-data"> 
       
                        <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>
        
                        <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>

  </table>
  <div>
    {{ $services->links() }}
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
                    url:"{{ route('services.index') }}",
                    type:"GET",
                    data:{'query':query},
                    success:function (data) {
                        $('tbody').empty().html(data);
                    }
                })
            }
            else{
                $('tbody').empty();
                @foreach($services as $index => $service)
                $('tbody').append(`
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->service_categories }}</td>
                        <td>{{ $service->description }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-success me-1" href="{{ route('services.show', $service->id) }}">Show</a>
                            <a class="btn btn-primary me-1" href="{{ route('services.edit', $service->id) }}">Edit</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="post">
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
