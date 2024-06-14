@extends('layouts.app')

@section('content')
<h1>Contact: {{ $contact->name }}</h1>

<a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit Contact</a>
<a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to Contacts</a>

<h2 class="mt-4">Contact Details</h2>
<table class="table mt-2">
    <tr>
        <th>Name</th>
        <td>{{ $contact->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $contact->email }}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{ $contact->phone }}</td>
    </tr>
    <tr>
        <th>Group</th>
        <td>{{ $contact->group->name ?? 'No Group' }}</td>
    </tr>
</table>
@endsection
