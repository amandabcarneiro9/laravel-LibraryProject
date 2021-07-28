<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['book', 'user'])->get();

        return view('orders/show')->with('orders', $orders);
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required|integer|min:1',
            'book_id' => 'required'
        ]);

        $book_id = $request->input('book_id');

        Order::create([
            'quantity' => $request->input('quantity'),
            'book_id' => $book_id,
            'user_id' => Auth::id()
        ]);

        session()->flash('success_message', 'Order completed!');

        return redirect(action('OrderController@index', $book_id));
    }
}
