<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Bookshop;
use App\Models\Publisher;
use App\Models\Review;

class Book extends Model
{
    use HasFactory;

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function bookshops()
    {
        return $this->belongsToMany(Bookshop::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'book_id');
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'book_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'book_id');
    }
}
