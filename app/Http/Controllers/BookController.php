<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
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
                    ->join('categories', 'book_category.category_id', '=', 'categories.id')
                    ->select('book.*')
                    ->where('book_category.category_id', '=', $category_id)
                    ->paginate(6);
    } else {
        $books = DB::table('book')->paginate(6);
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
    $categories = DB::table('categories')->get();
    return view('create', compact('categories'));
}
public function store(Request $request){
    $isbn = $request->input('isbn');
    $title = $request->input('title');
    $author = $request->input('author');
    $price = $request->input('price');
    $description = $request->input('description');
    $imagen = $request->input('imag');
    $published_date = $request->input('published_date');
    $category_ids = $request->input('category_id');

    $book_id = DB::table('book')->insertGetId([
        'isbn' => $isbn,
        'title' => $title,
        'author' => $author,
        'published_date' => $published_date,
        'description' => $description,
        'price' => $price,
        'img' => $imagen,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    foreach ($category_ids as $category_id) {
        DB::table('book_category')->insert([
            'book_id' => $book_id,
            'category_id' => $category_id
        ]);
    }
    return redirect()->route('books')->with('OK', 'Libro creado correctamente');
}

public function edit($id){
    $book = DB::table('book')->find($id);
    $categories = DB::table('categories')->get();
    $book_categories = DB::table('book_category')->where('book_id', $id)->pluck('category_id')->toArray();
    return view('edit', ['book' => $book, 'categories' => $categories, 'book_categories' => $book_categories]);
}


public function update(Request $request, $id)
{
    $isbn = $request->input('isbn');
    $title = $request->input('title');
    $author = $request->input('author');
    $price = $request->input('price');
    $description = $request->input('description');
    $imagen = $request->input('imag');
    $published_date = $request->input('published_date');
    $categories = $request->input('category_id');

    DB::table('book')->where('id', $id)->update([
        'isbn' => $isbn,
        'title' => $title,
        'author' => $author,
        'price' => $price,
        'description' => $description,
        'img' => $imagen,
        'published_date' => $published_date,
    ]);

    DB::table('book_category')->where('book_id', $id)->delete();

    if (!empty($categories)) {
        $data = array();
        foreach ($categories as $category) {
            $data[] = array('book_id' => $id, 'category_id' => $category);
        }
        DB::table('book_category')->insert($data);
    }

    return redirect()->route('show', ['id' => $id])>with('OK', 'Libro editado correctamente');
}



public function destroy($id){
    DB::table('book')->where('id', '=', $id)->delete();
    
    return redirect()->route('books')->with('OK', 'Libro eliminado correctamente');
}
}


