<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria; 
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    //los contrllers se componen de acciones
    // acciones =  metodos
    // pueden tener el nombre deseado
   public function index() {
    //dentro de la accion van la instrucciones a ejecutar
    //Seleccionar datos a treves del modelo
    $categorias = Categoria::paginate(5);
    //invocar a la vista e ingresar a la vista el listado de categorias 
    return view ("categorias.index")-> with("categorias", $categorias);
    //echo "Lista de Categorias";
   }

   //Accion create: mostar el formulario para registro de categoria 
   public function create(){
       return view("categorias.new");
   }
   //Accion store: guardar la categoria que vine desde el formulario 
   public function store(){

       //validar datos 
       //reglas de validacion para campos en mis formularios 
       $reglas=[
           "nombre" => ["required", "alpha", "min:4", "unique:category,name"]
       ]; 
        //mensajes en español
        $mensajes=[
            "required" => "Campo Obligatorio",
            "alpha" => "Solo letras",
            "min" => "Solo categorias de :min caracteres",
            "unique" => "Categoria repetida"
        ];
       //aplicar la validación
       //creando un objeto validador 
       $validador = Validator::make($_POST, $reglas);

       //Con los datos a validar y las reglas
       // hacer comparación de reglas
       if($validador->fails()){
           //la validación fallo
           //redirigir al formulario los mensajes de error
           //y tambien con los datos traidos desde el formulario
           return redirect("categorias/create")->withErrors($validador)->withInput();      
       }else {
             //la validacion no falla
             //la ejecucion del flujo normal del caso de uso 
             //Crear mi objeto categoria
             $categoria = new Categoria;
             //Asignarle el nombre 
             $categoria->name = $_POST["nombre"];
             //guardar
             $categoria->save();
             // letreto de exito: por medio de un redireccionamiento 
              return redirect('categorias/create')->with("Exito!", "Categoria registrada");
              //ridereccionamos a rutas que tengamos en el web.php
       }
     
    }
  
    //mostrar el formulario de actualizar
    public function edit($idcategoria){
       //seleccionar la categoria que tenga id
       $categoria = Categoria::find($idcategoria);
       // llevar los datos de la categoria a al vista edición 
       return view('categorias.edit')->with("categoria", $categoria);
    }

    //Guarda la categoria actualizada
    public function update(){
      //seleccionar categoria a editar 
      $categoria = Categoria::find($_POST["id"]);
      //actualizamos atributos
      $categoria->name = $_POST["nombre"];
      //guardar cambios 
      $categoria->save();
      echo "cambios guardar";
    }

}


