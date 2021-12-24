@extends('projects.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Csiga Project Handler (Fogarasi Gergő)</h2>
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
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
			<th>Status</th>
			<th>The number of contacts</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects->sortBy('ID') as $project)
			@if ($project->status === 1)
			<tr class="aRowWithStatus1">
				<td>{{ $project->ID }}</td>
				<td>{{ $project->name }}</td>
				<td>{{ $project->description }}</td>
				<td>{{ DB::table('status')->select('description')->where('ID', $project->status)->get()->first()->description }}</td>
				<td>{{ substr_count($project->contacts, ",") + 1 }}</td>
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
			@elseif ($project->status === 2)
			<tr class="aRowWithStatus2">
				<td>{{ $project->ID }}</td>
				<td>{{ $project->name }}</td>
				<td>{{ $project->description }}</td>
				<td>{{ DB::table('status')->select('description')->where('ID', $project->status)->get()->first()->description }}</td>
				<td>{{ substr_count($project->contacts, ",") + 1 }}</td>
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
			@elseif ($project->status === 3)
			<tr class="aRowWithStatus3">
				<td>{{ $project->ID }}</td>
				<td>{{ $project->name }}</td>
				<td>{{ $project->description }}</td>
				<td>{{ DB::table('status')->select('description')->where('ID', $project->status)->get()->first()->description }}</td>
				<td>{{ substr_count($project->contacts, ",") + 1 }}</td>
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
			@else
			<tr class="aRowWithStatusOther">
				<td>{{ $project->ID }}</td>
				<td>{{ $project->name }}</td>
				<td>{{ $project->description }}</td>
				<td>{{ DB::table('status')->select('description')->where('ID', $project->status)->get()->first()->description }}</td>
				<td>{{ substr_count($project->contacts, ",") + 1 }}</td>
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
			@endif
        @endforeach
    </table>







<label for="statusFilterPossibilities">Filter for status:</label>
<select name="statusFilterPossibilities" id="statusFilterPossibilities" value="-1" class="form-control theFilter">
  <option value="-1">---show all---</option>
  <option value="1">awaiting development</option>
  <option value="2">in progress</option>
  <option value="3">done</option>
</select>
<span id="filterJustSet">status filter: (---show all---) (-1)</span>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
setTimeout(function() {
	$('.theFilter').on('click', function () {
		var filterValue = this.value;
		var filterText = $( "#statusFilterPossibilities option:selected" ).text();
		
		$('#filterJustSet').text('status filter: ' + '(' + filterText + ') (' + filterValue + ')');

		if(filterValue == 1) {
			$(".aRowWithStatus1").css("opacity", "100%"); // highlighted
			$(".aRowWithStatus2").css("opacity", "5%"); // hidden
			$(".aRowWithStatus3").css("opacity", "5%"); // hidden
			$(".aRowWithStatusOther").css("opacity", "5%"); // hidden
		}
		else if(filterValue == 2) {
			$(".aRowWithStatus1").css("opacity", "5%"); // hidden
			$(".aRowWithStatus2").css("opacity", "100%"); // highlighted
			$(".aRowWithStatus3").css("opacity", "5%"); // hidden
			$(".aRowWithStatusOther").css("opacity", "5%"); // hidden
		}
		else if(filterValue == 3) {
			$(".aRowWithStatus1").css("opacity", "5%"); // hidden
			$(".aRowWithStatus2").css("opacity", "5%"); // hidden
			$(".aRowWithStatus3").css("opacity", "100%"); // highlighted
			$(".aRowWithStatusOther").css("opacity", "5%"); // hidden
		}
		else {
			$(".aRowWithStatus1").css("opacity", "100%"); // highlighted
			$(".aRowWithStatus2").css("opacity", "100%"); // highlighted
			$(".aRowWithStatus3").css("opacity", "100%"); // highlighted
			$(".aRowWithStatusOther").css("opacity", "100%"); // highlighted
		}

	})
	.trigger('click');
}, 1000);
});
</script>












    {!! $projects->links() !!}
@endsection