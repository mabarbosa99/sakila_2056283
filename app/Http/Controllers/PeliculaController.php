<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;
class PeliculaController extends Controller
{
    //accion para mostrar el catalogo de peliculas 
    public function index(){
        //Seleccionar todas las peliculas 
        $peliculas = Pelicula::paginate(5);
        //enviarlas a la vista 
        return view('peliculas.index')->with("peliculas", $peliculas);
    }
}
