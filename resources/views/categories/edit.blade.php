@extends('layouts.app')
@section('content')
<h2>Add Category</h2>
<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="mb-2">
        <label>Name</label>
        <input name="name" class="form-control" required>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection