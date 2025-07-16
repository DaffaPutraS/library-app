@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-2">
    <h2>Books</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
</div>
<table class="table table-bordered" id="books-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Authors</th>
            <th>Categories</th>
            <th>ISBN</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr id="book-{{ $book->id }}">
            <td>{{ $book->title }}</td>
            <td>{{ $book->authors }}</td>
            <td>
                @foreach($book->categories as $cat)
                    <span class="badge bg-info">{{ $cat->name }}</span>
                @endforeach
            </td>
            <td>{{ $book->isbn }}</td>
            <td>
                <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $book->id }}">Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
@push('scripts')
<script>
$(function() {
    $('#books-table').DataTable();
    $('.btn-delete').click(function() {
        if(confirm('Delete this book?')) {
            let id = $(this).data('id');
            $.ajax({
                url: '/books/' + id,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function() { $('#book-' + id).remove(); }
            });
        }
    });
});
</script>
@endpush