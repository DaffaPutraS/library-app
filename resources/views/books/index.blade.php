@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Books</h2>
    @if(Auth::user()->role !== 'member')
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
    @endif
</div>
<div class="card shadow-lg">
    <div class="card-body">
        <table class="table table-hover table-striped align-middle" id="books-table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Categories</th>
                    <th scope="col">ISBN</th>
                    @if(Auth::user()->role !== 'member')
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr id="book-{{ $book->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->authors }}</td>
                    <td>
                        @foreach($book->categories as $cat)
                            <span class="badge bg-info text-dark">{{ $cat->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $book->isbn }}</td>
                    @if(Auth::user()->role !== 'member')
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $book->id }}">Delete</button>
                    </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<style>
        margin-bottom: 1rem;
</style>
<script>
$(function() {
    var table = $('#books-table').DataTable();
    
    $(document).on('click', '.btn-delete', function() {
        if(confirm('Delete this book?')) {
            let id = $(this).data('id');
            $.ajax({
                url: '/books/' + id,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function() { 
                    $('#book-' + id).remove();
                    table.draw(false);
                }
            });
        }
    });
});
</script>
@endpush