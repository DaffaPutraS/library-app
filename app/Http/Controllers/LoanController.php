<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['book', 'librarian', 'member'])->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $books = Book::all();
        $librarians = User::where('role', 'librarian')->get();
        $members = User::where('role', 'member')->get();
        return view('loans.create', compact('books', 'librarians', 'members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'librarian_id' => 'required|exists:users,id',
            'member_id' => 'required|exists:users,id',
            'loan_at' => 'required|date',
            'returned_at' => 'nullable|date|after_or_equal:loan_at',
            'note' => 'nullable|string|max:255'
        ]);
        Loan::create($validated);
        return redirect()->route('loans.index')->with('success', 'Loan added.');
    }

    public function edit(Loan $loan)
    {
        $books = Book::all();
        $librarians = User::where('role', 'librarian')->get();
        $members = User::where('role', 'member')->get();
        $loan->load(['book', 'librarian', 'member']);
        return view('loans.edit', compact('loan', 'books', 'librarians', 'members'));
    }

    public function update(Request $request, Loan $loan)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'librarian_id' => 'required|exists:users,id',
            'member_id' => 'required|exists:users,id',
            'loan_at' => 'required|date',
            'returned_at' => 'nullable|date|after_or_equal:loan_at',
            'note' => 'nullable|string|max:255'
        ]);
        $loan->update($validated);
        return redirect()->route('loans.index')->with('success', 'Loan updated.');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return response()->json(['success' => true]);
    }
}