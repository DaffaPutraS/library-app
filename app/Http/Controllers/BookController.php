<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::with('categories')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        // Hanya admin & librarian yang boleh membuat buku baru
        if (Auth::user()->role === 'member') {
            return redirect()->route('books.index')
                ->with('error', 'Anda tidak memiliki izin untuk menambah buku.');
        }
        
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Cek kembali role di sini untuk keamanan berlapis
        if (Auth::user()->role === 'member') {
            return redirect()->route('books.index')
                ->with('error', 'Anda tidak memiliki izin untuk menambah buku.');
        }
        
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

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        // Hanya admin & librarian yang boleh edit
        if (Auth::user()->role === 'member') {
            return redirect()->route('books.index')
                ->with('error', 'Anda tidak memiliki izin untuk mengedit buku.');
        }
        
        $categories = Category::all();
        $book->load('categories');
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        // Cek kembali role di sini
        if (Auth::user()->role === 'member') {
            return redirect()->route('books.index')
                ->with('error', 'Anda tidak memiliki izin untuk mengedit buku.');
        }
        
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
        // Hanya admin & librarian yang boleh hapus
        if (Auth::user()->role === 'member') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        $book->delete();
        return response()->json(['success' => true]);
    }
}