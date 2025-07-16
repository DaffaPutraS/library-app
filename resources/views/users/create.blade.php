@extends('layouts.app')
@section('content')
<h2>Add User</h2>
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <div class="mb-2">
        <label>Name</label>
        <input name="name" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Email</label>
        <input name="email" type="email" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Password</label>
        <input name="password" type="password" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Phone</label>
        <input name="phone" class="form-control">
    </div>
    <div class="mb-2">
        <label>Address</label>
        <input name="address" class="form-control">
    </div>
    <div class="mb-2">
        <label>Role</label>
        <select name="role" class="form-control" required>
            <option value="">Choose role</option>
            <option value="admin">Admin</option>
            <option value="librarian">Librarian</option>
            <option value="member">Member</option>
        </select>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection