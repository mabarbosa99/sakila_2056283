<h1> Lista de peliculas</h1>
<table>
    <thead></thead>
    <tr>
        <td>Titulo</td>
        <td>Clasificación</td>
        <td>Idioma</td>
        <th>Categoria<th>
    </tr>
    <tbody>
        @foreach ($peliculas as $p)
        <tr>
        <td>{{ $p->title}}</td>
        <td>{{ $p->rating}}</td>
        <td>{{ $p->actor}}</td>
        <td> {{$p->idioma()->first()->name}}</td>
        <td>
          @foreach ($p->categorias()->getresults() as $categoria)
          {{ $categoria->name }}
              
          @endforeach
        </td>
        <td>
            <td>
                @foreach ($p->actor()->getresults() as $actor)
                {{$actor->first_name}}
                    
                @endforeach
        </td>
        </tr>
            
        @endforeach
    </tbody>
</table>