<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

public function index(Request $request){
    $category_id = $request->input('category_id');
    $categories = DB::table('categories')->get();

    if ($category_id) {
        $books = DB::table('book')
                    ->join('book_category', 'book.id', '=', 'book_category.book_id')
                    ->where('book_category.category_id', '=', $category_id)
                    ->paginate(5);
    } else {
        $books = DB::table('book')->paginate(5);
    }

    return view('index', compact('books', 'categories', 'category_id'));
}
    


public function show($id){
    $book = DB::table('book')
                ->leftJoin('book_category', 'book.id', '=', 'book_category.book_id')
                ->leftJoin('categories', 'book_category.category_id', '=', 'categories.id')
                ->select('book.*', 'categories.name as category_name')
                ->where('book.id', $id)
                ->first();
    
    $categories = DB::table('book_category')
                    ->join('categories', 'book_category.category_id', '=', 'categories.id')
                    ->where('book_category.book_id', '=', $id)
                    ->get();

    return view('show', compact('book', 'categories'));
}



public function create(){
    return view('create');
}
public function store(Request $request){
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
        'price' => $price,
        'created_at' => now(),
        'updated_at' => now()

    ]);

    return redirect()->route('books')->with('OK', 'Libro creado correctamente');
}
public function edit($id){
    $book = DB::table('book')->find($id);
    
    return view('edit', ['book' => $book]);
}
public function update(Request $request, $id){
    $isbn = $request->input('isbn');
    $title = $request->input('title');
    $author = $request->input('author');
    $price = $request->input('price');
    $description = $request->input('description');
    $published_date = $request->input('published_date');

    DB::table('book')->where('id', $id)->update([
        'isbn' => $isbn,
        'title' => $title,
        'author' => $author,
        'published_date' => $published_date,
        'description' => $description,
        'price' => $price
    ]);

    return redirect()->route('books')->with('OK', 'Libro actualizado correctamente');
}
public function destroy($id){
    DB::table('book')->where('id', '=', $id)->delete();
    
    return redirect()->route('books')->with('OK', 'Libro eliminado correctamente');
}



}


