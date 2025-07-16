@extends('layouts.app')
@section('content')
<h2>Edit Category</h2>
<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf @method('PUT')
    <div class="mb-2">
        <label>Name</label>
        <input name="name" class="form-control" value="{{ $category->name }}" required>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection