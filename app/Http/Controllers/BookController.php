<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Review;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'authors' => 'required|min:3|max:255',
            'image' => 'required|min:3|max:255'
        ]);

        $book = new Book;
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');
        $book->save();


        return redirect(action('BookController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { {
            $book = Book::with(['reviews', 'publisher'])->findOrFail($id);

            return view('books.show', compact('book'))->with('user', Auth::user());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'authors' => 'required|min:3|max:255',
            'image' => 'required|min:3|max:255'
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');
        $book->save();

        return redirect(action('BookController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect(action('BookController@index'));
    }

    public function createReview(Request $request, $book_id)
    {
        $this->validate($request, [
            'review' => 'required|max:255',
            'rating' => 'required|integer|min:0|max:100',
        ]);

        Review::create([
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
            'book_id' => $book_id
        ]);

        session()->flash('success_message', 'Review saved!');

        return redirect(action('BookController@show', $book_id));
    }

    public function destroyReview($review_id)
    {
        $review = Review::findOrFail($review_id);
        $review->delete();

        session()->flash('success_message', 'Review deleted!');

        return redirect(action('BookController@show', [$review->book_id]));
    }
}
