<table>
    <thead>
        <tr>
            <th>Nombre juego</th>
            <th>Imagen</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $game)
            <tr>
                <td>{{ $game->name }}</td>
                <td>
                    <img src="{{ public_path().'/'.$game->image }}" alt="" width="35"> 
                </td>
                <td>{{ $game->description }}</td>
                <td>{{ $game->price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>