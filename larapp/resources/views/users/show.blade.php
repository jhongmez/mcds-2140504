@extends('layouts.app')

@section('title', 'LARAPP - Consultar Usuario')

@section('content')

<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1>Consultar usuario</h1>
        <hr>
        <table class="table table-striped table-hover">
            <tr>
                <td colspan="2" class="text-center">
                    <img src="{{ asset($user->photo) }}" class="img-thumbnail" alt="" width="120">
                </td>
            </tr>
            <tr>
                <th>Nombre completo</th>
                <td>{{ $user->fullname }}</td>
            </tr>
            <tr>
                <th>Correo electrónico</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Direccion</th>
                <td>{{ $user->address }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $user->phone }}</td>
            </tr>
            <tr>
                <th>Fecha de nacimiento</th>
                <td>{{ $user->birthdate }}</td>
            </tr>
            <tr>
                <th>Genero</th>
                <td>
                    @if ($user->gender == 'Female')
                        Mujer
                    @else
                        Hombre
                    @endif
                </td>
            </tr>
            <tr>
                <th>Rol del usuario</th>
                <td>{{ $user->role }}</td>
            </tr>
            <tr>
                <th>¿Me encuentro activo?</th>
                <td>
                    @if($user->active == 1)
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection