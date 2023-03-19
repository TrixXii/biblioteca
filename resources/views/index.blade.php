    @extends('welcome')

    @section('content')

        <div class="container">
            <h1>Lista de libros</h1>
            <hr>

            <form method="GET" action="{{ route('books') }}">
        <div class="form-group">
            <label for="category_id">Filtrar por categoría:</label>
            <select name="category_id" id="category_id" class="form-control" onchange="this.form.submit()">
                <option value="">Todas las categorías</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </form> 
    <a class="m-3" href="{{ route('create') }}">Crear</a>

    <div id="contenido" class="row row-cols-md-3 g-3 m-auto">
    @foreach($books as $book)
    <div class="col">
        <div class="card">
            <img src="{{$book->img}}" alt="" id="imagen" class="object-fit-cover card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$book->title}}</h5>
                <p class="card-text"><b>Author:</b>{{$book->author}}</p>
            </div>
    
            <div class="pb-2 card-footer">
                <small class="text-muted "><b>isbn:</b>{{$book->isbn}}</small>
                <div class="d-flex p-1">
                    <a href="{{ route('edit', $book->id) }}" class="btn btn-warning m-1">Editar</a>
                    <form method="POST" action="{{ route('destroy', ['id' => $book->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-1">Eliminar</button>
                    </form>
                    
                    <a href="{{ route('show', $book->id) }}" class="btn btn-info m-1">Mas info</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach</div>


           <p class="m-3"> {{$books->links()}}</p>
        </div>
    @endsection
