@extends('layouts.app')

@section('content')
    <h1>Groups</h1>
    <div class="d-flex">
        <a href="{{ route('groups.create') }}" class="btn btn-primary mb-5 ">Add New Group</a>
        <a href="{{ route('contacts.index') }}" class="btn btn-outline-primary mb-5 mx-5">Contacts</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td><a class="btn btn-primary" href="{{ route('groups.show', $group->id) }}">View Contacts</a>
                        <td><a class="btn btn-warning" href="{{ route('groups.edit', $group->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
