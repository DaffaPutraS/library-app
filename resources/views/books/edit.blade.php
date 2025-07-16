@extends('layouts.app')
@section('content')
<h2>Edit Book</h2>
<form method="POST" action="{{ route('books.update', $book) }}">
    @csrf @method('PUT')
    <div class="mb-2">
        <label>Title</label>
        <input name="title" class="form-control" value="{{ $book->title }}" required>
    </div>
    <div class="mb-2">
        <label>Authors</label>
        <input name="authors" class="form-control" value="{{ $book->authors }}">
    </div>
    <div class="mb-2">
        <label>ISBN</label>
        <input name="isbn" class="form-control" value="{{ $book->isbn }}">
    </div>
    <div class="mb-2">
        <label>Description</label>
        <textarea name="description" id="summernote" class="form-control">{{ $book->description }}</textarea>
    </div>
    <div class="mb-2">
        <label>Categories</label>
        <select name="categories[]" class="form-control" multiple>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @if($book->categories->contains($cat->id)) selected @endif>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
@push('scripts')
<script>
$(function() { $('#summernote').summernote({height: 120}); });
</script>
@endpush