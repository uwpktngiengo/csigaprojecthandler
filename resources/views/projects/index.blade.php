@extends('projects.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Csiga Project Handler (Fogarasi Gergő)</h2>
				<img src="{{URL::asset('/image/logo.jpg')}}" alt="Csiga Project Handler - Logo" height="200" width="200">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>
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
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
			<th>Status</th>
			<th>Contacts</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $project)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
			<td>{{ $project->status }}</td>
			<td>{{ $project->contacts }}</td>
            <td>
                <form action="{{ route('projects.destroy', $project->ID) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('projects.show', $project->ID) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('projects.edit', $project->ID) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $projects->links() !!}
@endsection