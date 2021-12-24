@extends('statuses.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Csiga Project Handler (Fogarasi Gergő)</h2>
				<img src="{{URL::asset('/image/logo.jpg')}}" alt="Csiga Project Handler - Logo" height="200" width="200">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('statuses.create') }}"> Create New Status</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($statuses as $status)
        <tr>
            <td>{{ $status->ID }}</td>
            <td>{{ $status->description }}</td>
            <td>
                <form action="{{ route('statuses.destroy', $status->ID) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('statuses.show', $status->ID) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('statuses.edit', $status->ID) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $statuses->links() !!}
@endsection