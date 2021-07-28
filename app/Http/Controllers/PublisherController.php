<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publisher;
use App\Models\Book;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::get();
        return view('eshop/publishers')->with('publishers', $publishers);
    }

    public function show($publisher_id)
    {
        // $books = Book::where('publisher_id', $publisher_id)->get();
        $publisher = Publisher::findOrFail($publisher_id);
        // $books = $publisher->books;


        return view('eshop/details')
            // ->with('books', $books)
            ->with('publisher', $publisher);
    }
}
