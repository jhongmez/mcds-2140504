<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Usuarios</title>
    <style>
        table {
            border: 1px solid #aaa;
            border-collapse: collapse;
        }
        table th, table td {
            font-family: sans-serif;
            font-size: 10px;
            border: 1px solid #ccc;
            padding: 4px;
        }
        table tr:nth-child(odd) {
            background-color: #eee;
        }
        table th {
            background-color: #666;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nombre completo</th>
                <th>Correo electrónico</th>
                <th>Teléfono</th>
                <th>Fecha de nacimiento</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
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
</body>
</html>