@extends('layouts.app')

@section('title', 'LARAPP - Lista de Juegos')
    
@section('content')


<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1>Lista de Juegos</h1>
        <hr>
        <a href="{{ url('games/create') }}" class="btn btn-success"> Adicionar </a>
        <a href="{{ url('generate/pdf/games') }}" class="btn btn-warning"> Exportar PDF </a>
        <div class="table-responsive">
            <table class="table table-striped table-hover mt-4">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($games as $game)
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection