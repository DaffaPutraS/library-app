@extends('layouts.app')
@section('content')
<h2>Add Book</h2>
<form method="POST" action="{{ route('books.store') }}">
    @csrf
    <div class="mb-2">
        <label>Title</label>
        <input name="title" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Authors</label>
        <input name="authors" class="form-control">
    </div>
    <div class="mb-2">
        <label>ISBN</label>
        <input name="isbn" class="form-control">
    </div>
    <div class="mb-2">
        <label>Description</label>
        <textarea name="description" id="summernote" class="form-control"></textarea>
    </div>
    <div class="mb-2">
        <label>Categories</label>
        <select name="categories[]" class="form-control" multiple>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
@push('scripts')
<script>
$(function() { $('#summernote').summernote({height: 120}); });
</script>
@endpush