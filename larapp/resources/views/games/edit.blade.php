@extends('layouts.app')

@section('title', 'LARAPP - Editar juego')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Editar juego</h1>
        <hr>
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
            </div>
        </div>
        <form method="POST" action="{{ url('games/'.$game->id) }}" enctype="multipart/form-data">
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
                       <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="photo" name="image" accept="image/*">
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
                <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autocomplete="description" autofocus>{{ $game->description }}</textarea>
    
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="">
                    <option value="">Seleccione usuario</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if($user->id == old('user_id', $game->user_id)) selected @endif>{{ $user->fullname }}</option>
                    @endforeach
                </select>

                @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                    <option value="">Seleccione categoria</option>
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}" @if($cat->id == old('category_id', $game->category_id)) selected @endif>{{ $cat->name }}</option>
                    @endforeach
                </select>

                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $game->price) }}">
    
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <select name="slider" class="form-control @error('slider') is-invalid @enderror" id="slider">
                    <option value="">Seleccione presentacion</option>
                    <option value="1" @if (old('slider', $game->slider) == 1) selected @endif> Si</option>
                    <option value="2" @if (old('slider', $game->slider) == 2) selected @endif> No</option>
                </select>

                @error('slider')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                    <button type="submit" class="btn btn-larapp btn-block text-uppercase">
                        Editar
                        <i class="fa fa-save"></i> 
                    </button>
            </div>
        </form>
    </div>
</div>

@endsection