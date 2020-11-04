@extends('layouts.app')

@section('title', 'LARAPP - Consultar Categoria')

@section('content')

<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1>Consultar categoria</h1>
        <hr>
        <table class="table table-striped table-hover">
            <tr>
                <td colspan="2" class="text-center">
                    <img src="{{ asset($category->photo) }}" class="img-thumbnail" alt="" width="120">
                </td>
            </tr>
            <tr>
                <th>Nombre categoria</th>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <th>Correo electrónico</th>
                <td>{{ $category->description }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection