@extends('layouts.app')

@section('content')
<h1>Edit Group</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('groups.update', $group->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Group Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $group->name) }}">
    </div>
    <button type="submit" class="btn btn-primary my-4">Update Group</button>
</form>
@endsection
