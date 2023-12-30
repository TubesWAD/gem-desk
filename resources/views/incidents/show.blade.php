@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2>Show Incident<br>
        </h2>
    </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('incidents.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
    
@endsection