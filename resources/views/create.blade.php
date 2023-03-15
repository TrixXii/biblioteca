@extends('welcome')

@section('content')
    <div class="container">
        <h1 class="text-center">Nuevo libro</h1>
        <hr>
        <form method="POST" class="w-75 m-auto" action="{{ route('store') }}">
            @csrf
            <div class="row g-3">
                <div class="col form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>
                <div class="col form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class=" col form-group">
                <label for="author">Autor</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            </div>
            <div class="form-group">
                <label for="imag">Portada</label>
                <input type="url" class="form-control" id="imag" name="imag" required>
            </div>
            <div class="row g-3">
            <div class=" col form-group">
                <label for="price">Precio</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class=" col form-group">
                <label for="published_date">Fecha publicacion</label>
                <input type="date" class="form-control" id="published_date" name="published_date">
            </div></div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control text-secondary" id="description" name="description"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, aliquid. A sint possimus totam vel at temporibus eveniet laudantium quasi?</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select multiple class="form-control" id="category_id" name="category_id[]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <p id="category-limit-text"></p>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger">Cancelar</button>

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
