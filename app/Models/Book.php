<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function categorias()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }
}

// namespace App;

// use Illuminate\Database\Eloquent\Model;

// class Event extends Model
// {
//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
// }

// namespace App\Http\Controllers;

// use App\Event;

// class EventController extends Controller
// {
//     public function index()
//     {
//         $events = Event::with('user')->get();

//         return view('index', compact('events'));
//     }
// }

// @foreach ($events as $event)
//     <div>
//         <h2>{{ $event->title }}</h2>
//         <p>Location: {{ $event->location }}</p>
//         <p>Date: {{ $event->date }}</p>
//         <p>Created by: {{ $event->user->name }}</p>
//     </div>
// @endforeach
