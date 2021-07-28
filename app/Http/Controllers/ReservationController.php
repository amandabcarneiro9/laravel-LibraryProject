<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Book;
use App\Models\User;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['book', 'user'])->get();

        return view('reservations/index')->with('reservations', $reservations);
    }

    public function create()
    {
        $books = Book::all();

        return view('reservations/create')->with('books', $books);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required',
            'from' => 'required|date|after_or_equal:today',
            'to' => 'required|date|after_or_equal:from',
        ]);

        Reservation::create([
            'book_id' => $request->input('book_id'),
            'from' => $request->input('from'),
            'to' => $request->input('to')
        ]);

        session()->flash('success_message', 'Reservation saved!');

        return redirect(action('ReservationController@index'));
    }
}
