<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<style>
    .card{
        height: 100%;
    }
    .imglateral{
        object-fit: cover;
        height: 100%;
    }
    #imagen{
        height: 253px;
    }
    body{
        background-image: url('../imag/libros.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }
    .container2{
        position: absolute;
        width: 70%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        
    }
    .categorias{
        border: gray 1px solid;
        color: gray;
        padding: 8px 16px;
        border-radius: 40px;
    }
    .rosita{
        background-color: pink;
    }
    .rosita:hover{
        background-color: #ebcceb;
    }
</style>
   <body>
   
    @yield('content')
   

    </body>
  
</html>
