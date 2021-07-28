<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;

class EshopController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        $books = DB::table('books')->get();

        return view('eshop/index')
            ->with('books', $books)
            ->with('categories', $categories);
    }

    public function show($id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        return view('index')->with('category', [$category]);
    }

    public function category($category_id)
    {
        $category = Category::findOrFail($category_id);
        // $subcategories = $category->subcategories;
        // $books = $category->books;

        //table('categories')->where('id', $category_id)->first();
        // $subcategories = $category->subcategory;
        // DB::table('subcategories')->where('category_id', $category_id)->get();
        // $books = 
        //DB::table('books')->where('category_id', $category_id)->get();

        return view('eshop.category', compact('category'));
        //return  view('eshop.category', compact('category'));
        // view('eshop/category')
        //     ->with('category', $category)
        //     ->with('subcategories', $subcategories)
        //     ->with('books', $books);
    }

    public function subcategory($subcategory_id)
    {
        // $category = DB::table('categories')->where('id', $category_id)->first();
        $subcategory = DB::table('subcategories')->where('id', $subcategory_id)->first();
        $books = DB::table('books')->where('subcategory_id', $subcategory_id)->get();

        return view('eshop/subcategory')
            ->with('subcategory', $subcategory)
            ->with('books', $books);
    }
}
