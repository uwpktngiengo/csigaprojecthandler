@extends('contacts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Csiga Project Handler (Fogarasi Gergő)</h2>
                <img src="{{URL::asset('/image/logo.jpg')}}" alt="Csiga Project Handler - Logo" height="200" width="200">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create New Contact</a>
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
            <th>E-mail</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>
                <form action="{{ route('contacts.destroy',$contact->ID) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('contacts.show',$contact->ID) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->ID) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $contacts->links() !!}
@endsection