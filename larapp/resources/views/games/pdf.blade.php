<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Juegos</title>
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
</body>
</html>