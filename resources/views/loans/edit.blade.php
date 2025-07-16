@extends('layouts.app')
@section('content')
<h2>Edit Loan</h2>
<form method="POST" action="{{ route('loans.update', $loan) }}">
    @csrf @method('PUT')
    <div class="mb-2">
        <label>Book</label>
        <select name="book_id" class="form-control" required>
            <option value="">Choose book</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}" @if($loan->book_id == $book->id) selected @endif>{{ $book->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Librarian</label>
        <select name="librarian_id" class="form-control" required>
            <option value="">Choose librarian</option>
            @foreach($librarians as $librarian)
                <option value="{{ $librarian->id }}" @if($loan->librarian_id == $librarian->id) selected @endif>{{ $librarian->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Member</label>
        <select name="member_id" class="form-control" required>
            <option value="">Choose member</option>
            @foreach($members as $member)
                <option value="{{ $member->id }}" @if($loan->member_id == $member->id) selected @endif>{{ $member->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Loan At</label>
        <input type="datetime-local" name="loan_at" class="form-control" value="{{ \Carbon\Carbon::parse($loan->loan_at)->format('Y-m-d\TH:i') }}">
    </div>
    <div class="mb-2">
        <label>Returned At</label>
        <input type="datetime-local" name="returned_at" class="form-control" value="{{ $loan->returned_at ? \Carbon\Carbon::parse($loan->returned_at)->format('Y-m-d\TH:i') : '' }}">
    </div>
    <div class="mb-2">
        <label>Note</label>
        <input name="note" class="form-control" value="{{ $loan->note }}">
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('loans.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection