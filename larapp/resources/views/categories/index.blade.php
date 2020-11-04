@extends('layouts.app')

@section('title', 'LARAPP - Lista de Categorias')
    
@section('content')


<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1>Lista de Categorias</h1>
        <hr>
        <a href="{{ url('categories/create') }}" class="btn btn-success"> Adicionar </a>
        <div class="table-responsive">
            <table class="table table-striped table-hover mt-4">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Foto</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <img src="{{ asset($category->photo) }}" alt="" width="35">
                            </td>
                            <td class="d-flex align-items-center">
                                <a href="{{ url('categories/'.$category->id) }}" class="btn btn-sm btn-primary">Consultar</a>
                                <a href="{{ url('categories/'.$category->id.'/edit') }}" class="btn btn-sm btn-primary ml-1 mr-1">Editar</a>
                                <form action="{{ url('categories/'.$category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
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