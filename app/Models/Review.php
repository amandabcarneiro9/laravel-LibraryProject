<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Review extends Model
{
    protected $fillable = ['review', 'book_id', 'rating'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
