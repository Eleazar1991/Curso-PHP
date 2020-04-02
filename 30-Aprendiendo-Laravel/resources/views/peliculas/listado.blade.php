@include('includes.header')
<!-- Imprimir por pantalla -->
{{ $titulo }}<br>
<?=$listado[1]?>
<p>{{ date('Y')}}</p>

<!-- comentario en blade -->
{{--Esto es un comentario --}}

<!-- Estructuras de control -->
@if($titulo && count($listado)<5 )
    <p>El titulo existe y el es este: {{$titulo}} y el listado de peliculas es menor que 5</p>
@elseif($titulo)
    <p>El titulo existe pero el listado no es mayor a 5</p>
@else    
    <p>El titulo no existe</p>
@endif

<!-- Bucles -->
@for($i=0;$i<20;$i++)
    El numero es: {{$i}} <br>
@endfor

<?php
$contador=1;
?>
@while($contador<50)
    @if($contador%2==0)
        Numero par: {{$contador}} </br>
    @endif
    <?php $contador++;?>
@endwhile

@foreach($listado as $pelicula)
    <p>{{$pelicula}}</p>
@endforeach

@include('includes.footer')