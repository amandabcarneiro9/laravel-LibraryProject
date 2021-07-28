<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;



class APIBookController extends Controller
{
    public function index()
    {
        $books = Book::get();



        return $books;
    }

    public function show($id)
    {
        $book = Book::with('reviews')->where('id', $id)->first();


        return $book;
    }

    public function storeReview(Request $request, $book_id)
    {

        $this->validate($request, [
            'rating' => 'min:0|max:10|numeric',
            'text' => 'required'
        ]);

        $rating = $request->input('rating');
        $text = $request->input('text');
        $user = Auth::user();


        $book = Book::findOrFail($book_id);

        $review = new Review;
        $review->book_id = $book_id;
        $review->review = $text;
        $review->rating = $rating;
        $review->user_id = $user->id;
        $review->save();

        return [
            'status' => 'success'
        ];
    }
}
