@extends('layouts.app')

@section('content')
<h1>Create New Group</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Group Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
    </div>
    <button type="submit" class="btn btn-primary my-4">Create Group</button>
</form>
@endsection
