<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
</head>
<body>
    {{-- Barra de navegacion --}}
    @include('layouts.navbar')

    <main class="container mt-5">
        @yield('content')
    </main>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"></script>
     {{-- <script src="{{ asset('js/sweetalert2.all.min.js') }}"> --}}

    <script>
        $(document).ready(function(){

            @if (session('message'))
                Swal.fire(
                'Felicitaciones',
                '{{ session('message') }}',
                'success'
            );
            @endif

            $('#photo').change(function(event) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

        });
    </script>
</body>
</html>
