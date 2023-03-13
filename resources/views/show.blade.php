@extends('welcome')

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Autor:</strong> {{ $book->author }}</p>
        <p><strong>Precio:</strong> {{ $book->price }}<span>€</span></p>
        <p><strong>Descripción:</strong> {{ $book->description }}</p>
        <p><strong>Fecha publicación:</strong> {{ $book->published_date }}</p>
        <p><strong>Categorías:</strong></p>
        <ul>
            @foreach ($categories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
        </ul>
        <a href="{{ route('books') }}">Volver</a>
    </div>
@endsection
