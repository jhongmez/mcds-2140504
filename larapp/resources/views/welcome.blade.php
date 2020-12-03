@extends('layouts.app')

@section('title', 'LARAPP - Pagina bienvenida')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>Juegos importantes</h3>
            <hr>
            <div class="owl-carousel owl-theme">
                @foreach( $sliders as $slider)
                    <div class="slider" style="background-image: url({{ asset($slider->image) }});">
                        <p>
                            {{ $slider->description}}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
javscript
    <div class="row mt-4">
        <div class="col-md-4 offset-4">
            <h3>Filtrar juegos por categoria</h3>
            <hr>
            <div class="form-group">
                <select name="" id="" class="form-control">
                    @foreach($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($cats as $cat)
                <h3 class="mt-5"> <img src="{{ asset($cat->photo) }}" width="80px"> </h3>
                <hr>
                <div class="row">

                    @foreach ($games as $game)
                        @if ($game->category_id == $cat->id)
                            <div class="col-md-4 mb-4">
                                <div class="card" style="width: 18rem;">
                                  <img src="{{ asset($game->image)}}" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h5 class="card-title">{{ $game->name }}</h5>
                                    <p class="card-text">{{ $game->description }}</p>

                                    @php
                                        $td = \Carbon\Carbon::now();
                                        $dt = \Carbon\Carbon::parse($game->created_at);
                                    @endphp
                                    <small class="text-muted">
                                        Creado hace: {{ $td->diffForHumans($dt, 1) }}
                                    </small>
                                    <a href="javascript:;" class="btn btn-block btn-primary mt-2">
                                        Ver más
                                    </a>
                                  </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                </div>
            @endforeach
        </div>
    </div>

@endsection