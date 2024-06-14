@extends('layouts.app')

@section('content')
    <h1 class="mb-2">Contacts</h1>
    <div class="d-flex">
        <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-5">Add New Contact</a>
        <a href="{{ route('groups.index') }}" class="btn btn-outline-primary mb-5 mx-5">Groups</a>
    </div>
    <div class="col-md-12 my-2">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="group-filter" class="form-label">Filter by Group:</label>
        <input type="text" id="group-filter" class="form-control">
    </div>

    <div class="table-responsive">
        <table id="contacts-table" class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Group</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var table = $('#contacts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('contacts.json') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'group.name', name: 'group.name' },
                    { data: 'edit', name: 'edit', orderable: false, searchable: false },
                    { data: 'show', name: 'show', orderable: false, searchable: false },
                    { data: 'delete', name: 'delete', orderable: false, searchable: false },
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf', 'print'
                ]
            });

            // Apply custom filter for group name
            $('#group-filter').on('keyup', function () {
                table.column('group.name:name').search(this.value).draw();
            });
        });
    </script>
@endsection
