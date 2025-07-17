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
    #loans-table_wrapper .dataTables_filter {
        margin-bottom: 1rem;
    }
</style>
@endpush
@push('scripts')
<script>
$(function() {
    $('#loans-table').DataTable();
    $('.btn-delete').click(function() {
        if(confirm('Delete this loan?')) {
            let id = $(this).data('id');
            $.ajax({
                url: '/loans/' + id,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function() { $('#loan-' + id).remove(); }
            });
        }
    });
});
</script>
@endpush