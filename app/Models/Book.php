<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'authors', 'isbn'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}