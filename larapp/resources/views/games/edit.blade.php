@extends('layouts.app')

@section('title', 'LARAPP - Editar Usuario')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Editar categoria</h1>
        <hr>
        <form action="{{ url('games/'.$game->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="id" value="{{ $game->id }}">
            <div class="form-group">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $game->name) }}" placeholder="Nombre" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="text-center my-3">
                    <img src="{{ asset($game->image) }}" class="img-thumbnail" id="preview" width="120px">
                </div>
                <div class="custom-file">
                   <input type="file" class="custom-file-input @error('iamge') is-invalid @enderror" id="photo" name="image" accept="image/*">
                   <label class="custom-file-label" for="customFile"> 
                        <i class="fa fa-upload"></i> 
                        Foto
                   </label>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>    
            </div>

            <div class="form-group">

                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old('description', $game->description) }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success btn-block text-uppercase">
                    Editar
                    <i class="fa fa-save"></i> 
                </button>
            </div>

        </form>
    </div>
</div>

@endsection