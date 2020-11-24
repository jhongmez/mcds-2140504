@forelse($users as $user)
	<tr>
        <td> {{ $user->fullname}} </td>
        <td class="d-none d-sm-table-cell"> {{ $user->email}} </td>
        <td class="d-none d-sm-table-cell"> {{ $user->phone}} </td>
        <td> 
            <img src="{{ asset($user->photo) }}" alt="" width="35"> 
        </td>
        <td class="d-flex align-items-center">
            <a href="{{ url('users/'.$user->id) }}" class="btn btn-primary btn-sm">Consultar</a>
            <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary btn-sm ml-1 mr-1">Editar</a>
            <form action="{{ url('users/'.$user->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button type="button" class="btn btn-danger btn-delete btn-sm">Eliminar</button>
            </form>
        </td>
    </tr>
@empty
	<tr>
		<td class="text-center" colspan="5">
			No hay usuarios con este nombre o correo electrónico.
		</td>
	</tr>
@endforelse