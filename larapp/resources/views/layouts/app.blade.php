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
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
</head>
<body>
    {{-- Barra de navegacion --}}
    @include('layouts.navbar')

    <main class="container mt-5">
        @yield('content')
    </main>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
     <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <script>
        $(document).ready(function() {
                /* - - -*/
                @if (session('message'))
                    Swal.fire({
                        title: 'Felicitaciones',
                        text: '{{ session('message') }}',
                        icon: 'success',
                        confirmButtonColor: '#1e5f74',
                        confirmButtonText: 'Aceptar'
                    });
                @endif

                @if(session('error'))
                     Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Acceso Denegado',
                        text: '{{ session('error') }}',
                        showConfirmButton: false,
                        timer: 2500
                    });
                @endif

                $('.btn-delete').click(function(event) {
                    Swal.fire({
                        title: 'Esta usted seguro ?',
                        text: 'Desea eliminar este registro',
                        icon: 'error',
                        showCancelButton: true,
                        cancelButtonColor: '#d0211c',
                        cancelButtonText: 'Cancelar',
                        confirmButtonColor: '#1e5f74',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {
                        if(result.value) {
                            $(this).parent().submit();
                        }
                    });
                });


            /* - - -*/
            $('#photo').change(function(event) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });


            /* * */

            $('.btn-excel').click(function(event) {
                $('#file').click();
            });
            $('#file').change(function(event) {
                $(this).parent().submit();
            });

            $('body').on('keyup','#qsearch', function(event){
                event.preventDefault();
                $q = $(this).val();
                $t = $('input[name=_token]').val();
                $m = $('#tmodel').val();
                $('.loader').removeClass('d-none');
                $('.table').hide();
                $sto = setTimeout(function(){
                    clearTimeout($sto);
                    $.post($m+'/search', {q: $q, _token: $t}, function(data) {
                        $('.loader').addClass('d-none');
                        $('#content').html(data);
                        $('.table').fadeIn('slow');
                    });
                }, 2000);
            });

            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:3
                    }
                }
            });

        });
    </script>
</body>
</html>
