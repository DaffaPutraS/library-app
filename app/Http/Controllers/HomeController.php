<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use App\Models\Category;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        // Data untuk dashboard
        $bookCount = Book::count();
        
        // Data untuk admin & librarian
        $categoryCount = Category::count();
        $loanCount = Loan::count();
        
        // Data untuk admin
        $userCount = User::count();
        
        return view('dashboard', compact('user', 'bookCount', 'categoryCount', 'loanCount', 'userCount'));
    }
}