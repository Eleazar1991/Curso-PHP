<h1>{{$titulo}}</h1>
<p>Accion index del controlador peliculasController</p>
@if(isset($parametro))
    {{$parametro}}
@endif

<a href="{{ action('peliculaController@detalle')}}">Detalle</a>

<a href="{{ route('detalle.pelicula')}}">Detalle</a>