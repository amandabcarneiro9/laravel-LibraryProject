<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Subcategory;

class category extends Model
{
    use HasFactory;

    public function books()
    {

        return $this->hasMany(Book::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
