<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('categories')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'authors' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'categories' => 'array|nullable'
        ]);

        $book = Book::create($validated);
        $book->categories()->sync($request->categories ?? []);
        return redirect()->route('books.index')->with('success', 'Book added.');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        $book->load('categories');
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'authors' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'categories' => 'array|nullable'
        ]);

        $book->update($validated);
        $book->categories()->sync($request->categories ?? []);
        return redirect()->route('books.index')->with('success', 'Book updated.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['success' => true]);
    }
}