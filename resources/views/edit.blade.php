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
                <label for="imag">Imagen</label>
                <input type="url" class="form-control" id="imag" name="imag"  value="{{$book->img}}" required>
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
                <label for="category_id">Categoría</label>
                <select multiple class="form-control" id="category_id" name="category_id[]">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (in_array($category->id, $book_categories)) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
                <p id="category-limit-text"></p>
            </div>
            <div class="form-group">
                <label for="published_date">Fecha de publicacion</label>
                <input type="date" class="form-control" id="published_date" value="{{$book->published_date}}" name="published_date">
            </div>
            <div class="form-group">
                <label for="published_date">Fecha de publicacion</label>
                <input type="date" class="form-control" id="published_date" value="{{$book->published_date}}" name="published_date">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-danger" href="{{ route('books') }}">Cancelar</a>
        </form>
    </div>
    <script>
        const maxCategories = 3;
        const select = document.getElementById('category_id');
        const limitText = document.getElementById('category-limit-text');

        select.addEventListener('change', (event) => {
            const selected = select.selectedOptions.length;
            if (selected > maxCategories) {
                event.target.value = '';
                limitText.innerText = `Seleccione un máximo de ${maxCategories} categorías`;
            } else {
                limitText.innerText = '';
            }
        });
    </script>
@endsection
