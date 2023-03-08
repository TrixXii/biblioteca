    @extends('welcome')

    @section('content')
        <div class="container">
            <h1>Lista de libros</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">isbn</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Author</th>
                        <th scope="col">Ver mas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th scope="row">{{$book->isbn}}</th>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td><a href="{{ route('show', $book->id) }}">Mas info</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="m-3" href="{{ route('create') }}">Crear</a>

           <p class="m-3"> {{$books->links()}}</p>
        </div>
    @endsection
