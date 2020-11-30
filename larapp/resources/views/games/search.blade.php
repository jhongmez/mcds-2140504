@forelse($games as $game)
	<tr>
        <td>{{ $game->name }}</td>
        <td>
            <img src="{{ asset($game->category->photo) }}" alt="" width="35">
        </td>
        <td>
            <img src="{{ asset($game->image) }}" alt="" width="35">
        </td>
        <td class="d-flex align-items-center">
            <a href="{{ url('games/'.$game->id) }}" class="btn btn-sm btn-primary">Consultar</a>
            <a href="{{ url('games/'.$game->id.'/edit') }}" class="btn btn-sm btn-primary ml-1 mr-1">Editar</a>
            <form action="{{ url('games/'.$game->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete btn-sm">Eliminar</button>
            </form>
        </td>
    </tr>
@empty
	<tr>
		<td class="text-center" colspan="5">
			No hay juegos con este nombre.
		</td>
	</tr>
@endforelse