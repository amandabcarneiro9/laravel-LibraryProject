<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;

use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::get();

        return view('eshop/authors')->with('authors', $authors);
    }

    public function create()
    {
        $author = new Author;
        return view('eshop.create', compact('author'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:2',
            'bio' => 'required|min:10'
        ], [
            'name.required' => 'Just give us the name, damn!',
            'name.min' => 'Nobody has a name that short'

        ]);
        //  prepare empty object

        $author = new Author;
        // fill object with request data
        $author->name = $request->input('name');
        $author->bio = $request->input('bio');
        $author->slug = Str::slug($author->name);


        // save the object
        $author->save();



        // flash success message
        session()->flash('success_message', 'Author saved!');

        // redirect to next page (edit)
        return redirect()->action('AuthorController@edit', [$author->id]);
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view('eshop.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'bio' => 'required|min:10'
        ], [
            'name.required' => 'Just give us the name, damn!',
            'name.min' => 'Nobody has a name that short'

        ]);
        // retrieve saved object from the database
        $author = Author::findOrFail($id);

        // fill object with request data
        $author->name = $request->input('name');
        $author->bio = $request->input('bio');
        $author->slug = Str::slug($author->name);

        // save the object
        $author->save();

        // flash success message
        session()->flash('success_message', 'Author saved!');
        // redirect to next page (edit)
        return redirect()->action('AuthorController@edit', [$author->id]);
    }
}
