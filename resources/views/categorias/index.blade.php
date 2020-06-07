<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista de categorias</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th colspan="2">
                   Nombre de Categoría
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $c)
              <tr>
                  <td>
                      {{$c->name}}
                  </td>

                  <th>
                      <a href="{{url ('categorias/edit/'.$c->category_id)}}">Actualizar</a>
                  </th>

              </tr>
                
            @endforeach
        </tbody>
    </table>
    <!--paginacion de categorias con el metodo links()-->
    {{ $categorias->links()}}
    
</body>
</html>