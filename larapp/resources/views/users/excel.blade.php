<table>
    <thead>
        <tr>
            <th>Nombre Completo</th>
            <th>Correo electrónico</th>
            <th>Teléfono</th>
            <th>Fecha de nacimiento</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->fullname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->birthdate }}</td>
            <td>
                <img src="{{ public_path().'/'.$user->photo }}" alt="" width="35"> 
            </td>
        </tr>
    @endforeach
    </tbody>
</table>