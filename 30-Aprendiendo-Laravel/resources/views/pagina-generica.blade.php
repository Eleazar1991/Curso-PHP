@extends('layouts.master')

@section('titulo','Generica')

<!-- modificar header -->
@section('header')
    <!-- Para mantener contenido que había en header -->
    @parent()
    <h2>Hola</h2>
@stop    

@section('content')
<h1>Contenido de la página generica</h1>
@stop