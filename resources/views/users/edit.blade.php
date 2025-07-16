@extends('layouts.app')
@section('content')
<h2>Edit User</h2>
<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf @method('PUT')
    <div class="mb-2">
        <label>Name</label>
        <input name="name" class="form-control" value="{{ $user->name }}" required>
    </div>
    <div class="mb-2">
        <label>Email</label>
        <input name="email" type="email" class="form-control" value="{{ $user->email }}" required>
    </div>
    <div class="mb-2">
        <label>Password (leave blank if not changing)</label>
        <input name="password" type="password" class="form-control">
    </div>
    <div class="mb-2">
        <label>Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control">
    </div>
    <div class="mb-2">
        <label>Phone</label>
        <input name="phone" class="form-control" value="{{ $user->phone }}">
    </div>
    <div class="mb-2">
        <label>Address</label>
        <input name="address" class="form-control" value="{{ $user->address }}">
    </div>
    <div class="mb-2">
        <label>Role</label>
        <select name="role" class="form-control" required>
            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
            <option value="librarian" @if($user->role == 'librarian') selected @endif>Librarian</option>
            <option value="member" @if($user->role == 'member') selected @endif>Member</option>
        </select>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection