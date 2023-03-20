@extends('welcome')

@section('content')
    <div class="container2 text-center">
        <div class="card text-start"> 
            <div class="row g-0">   
                <div class="card-header">
                    <h5 class="card-title">{{ $book->title }}</h5>
                </div>
                <div class="col-md-3">
                    <img class="img-fluid imglateral" src="{{ $book->img }}" alt="img">
                </div>
                <div class="col-md-8">
                    <div class="card-body ">
                        <div class="info">
                            <p><strong>Autor:</strong> {{ $book->author }}</p>
                            <p><strong>Precio:</strong> {{ $book->price }}<span>€</span></p>
                            <p><strong>Descripción:</strong> {{ $book->description }}</p>
                        </div>
                        <div>  <hr>
                            
                            @foreach ($categories as $category)
                                <span class="categorias"><i class="fa fa-plus"></i> {{ $category->name }}</span>
                            @endforeach
                        </div>  
                    </div>
                    
                </div> 
                <div class="card-footer text-muted">
                        <p><strong>ISBN:</strong> {{ $book->isbn }} <strong>Fecha publicación:</strong> {{ $book->published_date }}</p>

                        </div>
            </div>  
        </div>
        <a href="{{ route('books') }}" class="btn m-3 rosita"><i class="fa fa-reply"></i> Volver</a>
    </div>
@endsection
