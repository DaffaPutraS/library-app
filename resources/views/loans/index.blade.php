@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Loans</h2>
    <a href="{{ route('loans.create') }}" class="btn btn-primary">Add Loan</a>
</div>
<div class="card shadow-lg">
    <div class="card-body">
        <table class="table table-hover table-striped align-middle" id="loans-table">
            <thead class="table-dark">
                <tr>
                    <th>Book</th>
                    <th>Librarian</th>
                    <th>Member</th>
                    <th>Loan At</th>
                    <th>Returned At</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($loans as $loan)
                <tr id="loan-{{ $loan->id }}">
                    <td>{{ $loan->book->title ?? '-' }}</td>
                    <td>{{ $loan->librarian->name ?? '-' }}</td>
                    <td>{{ $loan->member->name ?? '-' }}</td>
                    <td>{{ $loan->loan_at }}</td>
                    <td>{{ $loan->returned_at ?? '-' }}</td>
                    <td>{{ $loan->note }}</td>
                    <td>
                        <a href="{{ route('loans.edit', $loan) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $loan->id }}">Delete</button>
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
        margin-bottom: 1rem;
    
</style>
@endpush
@push('scripts')
<script>
$(function() {
    var table = $('#loans-table').DataTable();
    
    $(document).on('click', '.btn-delete', function() {
        if(confirm('Delete this loan record?')) {
            let id = $(this).data('id');
            $.ajax({
                url: '/loans/' + id,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function() { 
                    $('#loan-' + id).remove();
                    table.draw(false);
                }
            });
        }
    });
});
</script>
@endpush