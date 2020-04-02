<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class peliculaController extends Controller
{
    public function index(){
        $titulo='Listado de mis peliculas';
        return view('pelicula.index',[
            'titulo' => $titulo
        ]);
    }

    public function conparametro($parametro = 1){
        $titulo='Listado de mis peliculas';
        return view('pelicula.index',[
            'titulo' => $titulo,
            'parametro'=> $parametro
        ]);
    }

    public function detalle($year=null){
        return view('pelicula.detalle');
    }

    public function redireccion(){
        return redirect()->action('peliculaController@index');
    }

    public function formulario(){
        return view('pelicula.formulario');
    }

    public function recibirFormulario(Request $request){
        $nombre=$request->input('nombre');
        $email=$request->input('email');
        return "El nombre es {$nombre} y el email es {$email}";
    }
}
