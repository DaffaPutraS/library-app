@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Books</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
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
                    <th scope="col">Action</th>
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
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $book->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<style>
    /* Bootstrap margin-bottom untuk search box DataTables */
    #books-table_wrapper .dataTables_filter {
        margin-bottom: 1rem; /* sama seperti mb-3 */
    }
</style>
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