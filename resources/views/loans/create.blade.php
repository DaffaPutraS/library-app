@extends('layouts.app')
@section('content')
<h2>Add Loan</h2>
<form method="POST" action="{{ route('loans.store') }}">
    @csrf
    <div class="mb-2">
        <label>Book</label>
        <select name="book_id" class="form-control" required>
            <option value="">Choose book</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Librarian</label>
        <select name="librarian_id" class="form-control" required>
            <option value="">Choose librarian</option>
            @foreach($librarians as $librarian)
                <option value="{{ $librarian->id }}">{{ $librarian->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Member</label>
        <select name="member_id" class="form-control" required>
            <option value="">Choose member</option>
            @foreach($members as $member)
                <option value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Loan At</label>
        <input type="datetime-local" name="loan_at" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Returned At</label>
        <input type="datetime-local" name="returned_at" class="form-control">
    </div>
    <div class="mb-2">
        <label>Note</label>
        <input name="note" class="form-control">
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('loans.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection