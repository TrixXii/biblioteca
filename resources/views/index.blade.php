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
    <div id="contenido" class="row row-cols-md-3 g-3 m-auto">
    @foreach($books as $book)
    <div class="col">
        <div class="card">
            <img src="{{$book->img}}" alt="" id="imagen" class="object-fit-cover card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$book->title}}</h5>
                <p class="card-text"><b>Author:</b>{{$book->author}}</p>
            </div>
            <a href="{{ route('edit', $book->id) }}">Editar</a>
            <form method="POST" action="{{ route('destroy', ['id' => $book->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                
                <a href="{{ route('show', $book->id) }}">Mas info</a>
            <div class="pb-2 card-footer">
                <small class="text-muted "><b>isbn:</b>{{$book->isbn}}</small>
            </div>
            
        </div>
    </div>
    @endforeach</div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">isbn</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Author</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Ver mas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th scope="row">{{$book->isbn}}</th>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td><a href="{{ route('edit', $book->id) }}">Editar</a></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="m-3" href="{{ route('create') }}">Crear</a>

           <p class="m-3"> {{$books->links()}}</p>
        </div>
    @endsection
