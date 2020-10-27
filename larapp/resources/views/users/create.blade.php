@extends('layouts.app')

@section('title', 'LARAPP - Crear usuarios')
    
@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Creacion de usuario</h1>
            <hr>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                      <a href="{{ url('home') }}">
                          <i class="fa fa-clipboard-list"></i>  
                          Escritorio
                      </a>
                  </li>
                  <li class="breadcrumb-item">
                      <a href="{{ route('users.index') }}">
                          <i class="fa fa-users"></i>  
                           Módulo Usuarios
                      </a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                      <i class="fa fa-pen"></i> 
                      Crear Usuario
                  </li>
                </ol>
            </nav>
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">@lang('general.label-fullname')</label>

                    <div class="col-md-6">
                        <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" autocomplete="fullname" autofocus>

                        @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">@lang('general.label-email')</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">@lang('general.label-phone')</label>

                    
                        <div class="col-md-6">
                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone">
    
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>

                <div class="form-group row">
                    <label for="birthdate" class="col-md-4 col-form-label text-md-right">@lang('general.label-birthdate')</label>

                    <div class="col-md-6">
                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" autocomplete="birthdate">

                        @error('birthdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gender" class="col-md-4 col-form-label text-md-right">@lang('general.label-gender')</label>

                    <div class="col-md-6">
                        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                            <option value="">@lang('general.select-value')</option>
                            <option value="Female" @if(old('gender') == 'Female') selected @endif>@lang('general.select-female')</option>
                            <option value="Male" @if(old('gender') == 'Male') selected @endif>@lang('general.select-male')</option>
                        </select>

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">@lang('general.label-address')</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="photo" class="col-md-4 col-form-label text-md-right">@lang('general.label-photo')</label>

                    <div class="col-md-6">
                        <div class="text-center my-3">
                            <img src="{{ asset('imgs/no-photo.png') }}" class="img-thumbnail" id="preview" width="120">
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
                    <label for="password" class="col-md-4 col-form-label text-md-right">@lang('general.label-password')</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('general.label-confirm')</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Adicionar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection