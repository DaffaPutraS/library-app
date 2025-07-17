@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
</div>
<div class="card shadow-lg">
    <div class="card-body">
        <table class="table table-hover table-striped align-middle" id="categories-table">
            <thead class="table-dark">
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
    </div>
</div>
@endsection
@push('styles')
<style>
    #categories-table_wrapper .dataTables_filter {
        margin-bottom: 1rem;
    }
</style>
@endpush
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