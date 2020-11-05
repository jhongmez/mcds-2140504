@extends('layouts.app')

@section('title', 'LARAPP - Consultar Juego')

@section('content')

<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1>Consultar juego</h1>
        <hr>
        <table class="table table-striped table-hover">
            <tr>
                <td colspan="2" class="text-center">
                    <img src="{{ asset($game->image) }}" class="img-thumbnail" alt="" width="120">
                </td>
            </tr>
            <tr>
                <th>Nombre juego</th>
                <td>{{ $game->name }}</td>
            </tr>
            <tr>
                <th>Descripción</th>
                <td>{{ $game->description }}</td>
            </tr>
            <tr>
                <th>Usuario que lo creo</th>
                <td>{{ $game->user->fullname }}</td>
            </tr>
            <tr>
                <th>Nombre categoria</th>
                <td>{{ $game->category->name }}</td>
            </tr>
            <tr>
                <th>Precio</th>
                <td>
                    {{ $game->price }}
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection