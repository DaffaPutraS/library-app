@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-2">
    <h2>Users</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
</div>
<table class="table table-bordered" id="users-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr id="user-{{ $user->id }}">
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $user->id }}">Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable();
    $('.btn-delete').click(function() {
        if(confirm('Delete this user?')) {
            let id = $(this).data('id');
            $.ajax({
                url: '/users/' + id,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function() { $('#user-' + id).remove(); }
            });
        }
    });
});
</script>
@endpush