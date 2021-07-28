<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bookshop;

class BookshopController extends Controller
{


    public function index()
    {
        $bookshops = Bookshop::get();
        return view('eshop/BookshopList')->with('bookshops', $bookshops);
    }

    public function create()
    {
        return view('eshop/Book_form');
    }

    public function save()
    {
        $bookshop = new Bookshop();

        $bookshop->name = $_POST['name'];
        $bookshop->city = $_POST['city'];

        $bookshop->save();
        return redirect('/bookshops');
    }

    public function show($id)
    {
        $bookshop = Bookshop::findOrFail($id);
        // dd($bookshop->book);
        return view('eshop/bookshopShow', compact('bookshop'));
    }
}
