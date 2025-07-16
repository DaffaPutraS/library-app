<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'book_id', 'librarian_id', 'member_id', 'loan_at', 'returned_at', 'note'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function librarian()
    {
        return $this->belongsTo(User::class, 'librarian_id');
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
}