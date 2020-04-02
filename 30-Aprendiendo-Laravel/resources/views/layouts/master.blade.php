<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulo - @yield('titulo')</title>
</head>
<body>
    @section('header')
      <h1>  Cabecera de la web (master) </h1>
    @show
    <hr>
    <div class="container">
        @yield('content')
    </div>
    <hr>
    @section('footer')
    <h1> Pie de pagina de la web(master) </h1>
    @show      
</body>
</html>