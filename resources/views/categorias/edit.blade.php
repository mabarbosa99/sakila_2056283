<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Categoria</title>
</head>
<body>
<form  method="POST" action="{{ url('categorias/update')}}" class="form-horizontal">
    @csrf
<input name="id" type="hidden" value="{{ $categoria->category_id }}"/>
            <fieldset>
             <!-- Detectar si la variable "Exito!" tiene un valor-->
             @if(session ("Exito!"));
              <div class="alert-success">{{session ("Exito!")}}</div>
             @endif
            <!-- Form Name -->
            <legend>Editar Categoría </legend>
            
            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="nombre">Nombre de Categoría </label>  
            <div class="col-md-4">
            <input id="nombre" name="nombre" value="{{$categoria->name}}" type="text" placeholder="Ingrese la categoría " class="form-control input-md">
            
            </div>
            </div>
            
            <!-- Button -->
            <div class="form-group">
            <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-4">
                <button id="" type="submit" name="" class="btn btn-primary">Enviar</button>
            </div>
            </div>
            
            </fieldset>
            </form>
        
</body>
</html>