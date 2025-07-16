@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-2">
    <h2>Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
</div>
<table class="table table-bordered" id="categories-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr id="category-{{ $category->id }}">
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $category->id }}">Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
@push('scripts')
<script>
$(function() {
    $('#categories-table').DataTable();
    $('.btn-delete').click(function() {
        if(confirm('Delete this category?')) {
            let id = $(this).data('id');
            $.ajax({
                url: '/categories/' + id,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function() { $('#category-' + id).remove(); }
            });
        }
    });
});
</script>
@endpush