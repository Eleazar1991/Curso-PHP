<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// // //Crear ruta
// // Route::get('/mostrar-fecha', function (){
// //     $titulo="Estoy mostrando la fecha";
// //     return view('mostrar-fecha',array('titulo'=>$titulo));
// // });

// // //Ruta con parametros
// // Route::get('/pelicula/{titulo}',function($titulo){
// //     return view('pelicula',array(
// //         'titulo'=>$titulo
// //     ));
// // });

// //Ruta con parametros opcionales
// // Route::get('/lapelicula/{titulo?}',function($titulo="No se ha facilitado pelicula"){
// //     return view('pelicula',array(
// //         'titulo'=>$titulo
// //     ));
// // });

// //Condiciones en las rutas
// Route::get('/lapelicula/{titulo}/{year?}',function($titulo,$year=2019){
//     return view('pelicula',array(
//         'titulo'=>$titulo,
//         'year'=>$year
//     ));
// })->where(array(
//     'titulo'=>'[a-zA-Z ]+',
//     'year'=>'[0-9 ]+'
// ));
// Route::get('/listado-peliculas',function(){
//     $titulo="Listado de peliculas";
//     $listado=array('Batman','Spiderman','Superman','Superman','Superman','Superman');
//     return view('peliculas.listado')
//             ->with('titulo',$titulo)
//             ->with('listado',$listado);
// });

// Route::get('/pagina-generica',function(){
//     return view('pagina-generica');
// });

Route::get('/peliculas', 'peliculaController@index');

Route::get('/peliculas/{parametro?}', 'peliculaController@conparametro');

Route::get('/detalle/{year?}',[
    'middleware'=>'testyear',
    'uses'=>'peliculaController@detalle',
    'as'=>'detalle.pelicula'
]);

Route::get('/redirigir','peliculaController@redireccion');

Route::get('/formulario','peliculaController@formulario');

Route::post('/recibir','peliculaController@recibirFormulario');

Route::resource('usuario','usuarioController');

Route::group(['prefix'=>'frutas'],function(){
    Route::get('index','frutaController@index');
    Route::get('detail/{id}','frutaController@detail');
    Route::get('create','frutaController@create');
    Route::post('save','frutaController@save');
    Route::get('delete/{id}','frutaController@delete');
    Route::get('edit/{id}','frutaController@edit');
    Route::post('update/{id}','frutaController@update');
});