<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
{
    $books = DB::table('book')->paginate(5);
        
    return view('index', ['books' => $books]);
}

public function show($id)
{
    $book = DB::table('book')->find($id);
    
    return view('show', ['book' => $book]);
}

public function create()
{
    return view('create');
}

public function store(Request $request)
{
    $isbn = $request->input('isbn');
    $title = $request->input('title');
    $author = $request->input('author');
    $price = $request->input('price');
    $description = $request->input('description');
    $published_date = $request->input('published_date');

    DB::table('book')->insert([
        'isbn' => $isbn,
        'title' => $title,
        'author' => $author,
        'published_date' => $published_date,
        'description' => $description,
        'price' => $price
    ]);

    return redirect()->route('books')->with('OK', 'Libro creado correctamente');
}

}


