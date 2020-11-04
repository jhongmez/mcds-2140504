@extends('layouts.app')

@section('title', 'LARAPP - Crear categorias')
    
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Creacion de categorias</h1>
        <hr>
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre categoria</label>
    
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="photo" class="col-md-4 col-form-label text-md-right">Foto categoria</label>

                <div class="col-md-6">
                    <div class="text-center my-3">
                        <img src="{{ asset('imgs/no-image.png') }}" class="img-thumbnail" id="preview" width="120">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" lang="es">
                        <label class="custom-file-label" for="photo">Seleccionar Archivo</label>
                    </div>

                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre categoria</label>
    
                <div class="col-md-6">

                    <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>
    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-block btn-success">
                        Adicionar
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>


@endsection