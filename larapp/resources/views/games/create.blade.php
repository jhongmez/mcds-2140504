@extends('layouts.app')

@section('title', 'LARAPP - Crear juegos')
    
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Creacion de juegos</h1>
        <hr>
        <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre juego</label>
    
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
                        <img src="{{ asset('imgs/no-game.png') }}" class="img-thumbnail" id="preview" width="120">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="photo" name="image" lang="es">
                        <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                    </div>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Descripcion</label>
    
                <div class="col-md-6">

                    <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>
    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Seleccione usuario</label>
    
                <div class="col-md-6">

                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="">
                        <option value="">Seleccione usuario</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if($user->id == old('user_id')) selected @endif>{{ $user->fullname }}</option>
                        @endforeach
                    </select>
    
                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Seleccione categoria</label>
    
                <div class="col-md-6">

                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                        <option value="">Seleccione categoria</option>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}" @if($cat->id == old('category_id')) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>
    
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="slider" class="col-md-4 col-form-label text-md-right">Seleccione presentacion</label>
        
                <div class="col-md-6">
    
                    <select name="slider" class="form-control @error('slider') is-invalid @enderror" id="slider">
                        <option value="">Seleccione presentacion</option>
                        <option value="1" @if (old('slider') == 1) selected @endif> Si</option>
                        <option value="2" @if (old('slider') == 2) selected @endif> No</option>
                    </select>
    
                    @error('slider')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-md-4 col-form-label text-md-right">Precio</label>

                <div class="col-md-6">
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">
    
                    @error('price')
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