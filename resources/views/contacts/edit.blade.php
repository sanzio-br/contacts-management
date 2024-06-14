<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Contact</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}" required>
        </div>
        <div class="form-group">
            <label for="group">Group:</label>
            <select class="form-control" id="group" name="group_id" required>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ $contact->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary my-4">Update</button>
    </form>
@endsection
