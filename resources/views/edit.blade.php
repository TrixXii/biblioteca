@extends('welcome')

@section('content')
    <div class="container">
        <h1>Editar libro</h1>
        <hr>
        <form method="POST" action="{{ route('update', ['id' => $book->id]) }} ">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{$book->isbn}}" required>
            </div>
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}" required>
            </div>
            <div class="form-group">
                <label for="author">Autor</label>
                <input type="text" class="form-control" id="author" name="author" value="{{$book->author}}" required>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$book->price}}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description">{{$book->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="published_date">Fecha de publicacion</label>
                <input type="date" class="form-control" id="published_date" value="{{$book->published_date}}" name="published_date">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-danger" href="{{ route('books') }}">Cancelar</a>
        </form>
    </div>

@endsection
