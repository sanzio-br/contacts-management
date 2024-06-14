@extends('layouts.app')

@section('content')
<h1>Group: {{ $group->name }}</h1>

<a href="{{ route('groups.edit', $group->id) }}" class="btn btn-warning">Edit Group</a>
<a href="{{ route('groups.index') }}" class="btn btn-secondary">Back to Groups</a>

<h2 class="mt-4">Contacts in this Group</h2>
<a href="{{ route('contacts.create') }}" class="btn btn-primary mb-2">Add New Contact</a>
<table class="table mt-2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($group->contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
