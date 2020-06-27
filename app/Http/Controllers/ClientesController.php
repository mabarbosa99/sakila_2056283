<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Address;
use App\Customer;

class ClientesController extends Controller
{
    public function create(){
        $paises = Country::all();

        return view('clientes.new')
        ->with("paises", $paises);
    }

    public function store(Request $r){
        // 1. Crear una dirección 
        $d = new Address();
        //campo de texto de dirección 
        $d->address = $r->input("direccion_cliente");
        // el id de la ciudad como clave foranea en address
        $d->city_id = $r->input("ciudad_cliente");
        //guardar la direccion 
        $d->save();
        //comprobar la direccion 
        echo $d->address_id;


        //2. Crear el cliente 
        $c = new Customer();
        $c->first_name = $r->input("nombre_cliente");
        $c->last_name = $r->input("apellido_cliente");
        $c->email = $r->input("email_cliente");
        //clave foranea de la store(store_id) queda fija a 1
        
        //vincular cliente a la dirección creada
        $c->address_id = $d->address_id;
        //verificar si llega el activo 

        if($r->input("activo_cliente")==null){
            $c->active = 0;
        }else{
            $c->active = 1;
        }
        $c->save();

        echo ("Usuario registrado con id: $c->customer_id");

        
    }
    
    
  
 
     

}
