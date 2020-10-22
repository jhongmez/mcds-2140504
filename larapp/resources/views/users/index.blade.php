@extends('layouts.app')

@section('title', 'LARAPP - Lista de Usuarios')
    
@section('content')

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1>Lista de Usuarios</h1>
            <hr>
            <a href="{{ url('users/create') }}" class="btn btn-success"> Adicionar </a>
            <div class="table-responsive">
                <table class="table table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th class="d-none d-sm-table-cell">Correo electroónico</th>
                            <th class="d-none d-sm-table-cell">Teléfono</th>
                            <th>Foto</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ $user->fullname}} </td>
                                    <td class="d-none d-sm-table-cell"> {{ $user->email}} </td>
                                    <td class="d-none d-sm-table-cell"> {{ $user->phone}} </td>
                                    <td> 
                                        <img src="{{ asset($user->photo) }}" alt="" width="35"> 
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ url('users/'.$user->id) }}" class="btn btn-primary btn-sm">Consultar</a>
                                        <a href="" class="btn btn-primary btn-sm ml-1 mr-1">Editar</a>
                                        <a href="" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <!-- Para realizar la paginación usamos links() -->
                <div class="d-flex justify-content-center">
                    {{  $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection