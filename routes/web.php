<?php

use App\Categoria;
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

Route::get('/', function () {
    return view('welcome');
});

//Ruta de prueba 
Route::get('prueba',function(){
   echo "ruta de prueba";
     
    //Definir un arreglo
    $estudiantes = [
        "Ana",
        "Jorge",
        "Maria"

    ];

    echo "<pre>";
    var_dump($estudiantes);
    echo "<pre";
});
Route::get('paises', function() {

    $paises = [ "Colombia" => [
                                "capital" => "Bogota",
                                "moneda"  => "Peso",
                                "poblacion" => 55,
                                "ciudades" => [
                                                "Cali", 
                                                "Medellin", 
                                                "Barranquilla"
                                              ]
                              ] ,
                "Ecuador" => [
                                "capital" => "Quito",
                                "moneda"  => "Dolar",
                                "poblacion" => 10,
                                "ciudades" => [
                                                "Guayaquil", "Manta", "Pichicha"
                                              ]
                              ] ,
                "Brasil" => [
                                "capital" => "Brazilia",
                                "moneda"  => "Real",
                                "poblacion" => 220,
                                "ciudades" => [
                                                "Santos", "Sao paulo", "Bahia"
                                              ]
                            ]
              ];

//pasar  el arreglo de paises a una vista
return view("paises")->with("paises", $paises);


});

//Ruta de controlador 
//Controlador y acccion se separan por arroba
Route::get('categorias', "CategoriaController@index");
//Añadir categoria 
Route::get("categorias/create", "CategoriaController@create");
//Guardar la nueva ruta 
Route::post('categorias/store' , "CategoriaController@store");
//Ruta para mostrar el formulario para actualizar (cambiar nombre)
Route::get("categorias/edit/{idcategoria}", "CategoriaController@edit");
//Ruta para guardar cambios de categoria 
Route::post("categorias/update", "CategoriaController@update");

//Rutas de peliculas 
Route::get("peliculas","PeliculaController@index");
Route::get("acordeon" , function(){
  //seleccionar todas las categorias 
  $categorias = App\Categoria::all();
  //meter categorias a las vistas
  return view('peliculas.acordeon')->with("categorias", $categorias);
});

Route::get("tabs" , function(){
  //seleccionar todas las categorias 
  $categorias = App\Categoria::all();
  //meter categorias a las vistas
 return view('peliculas.tabs')->with("categorias", $categorias);
});
Route::get("clientes/jsoncities/{id_pais}" , "LocationController@jsoncities");
Route::get("clientes/create", "ClientesController@create");
Route::post("clientes/store", "ClientesController@store");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
