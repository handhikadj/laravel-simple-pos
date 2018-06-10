<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @guest
    <script src="{{ asset('js/app.js') }}" defer></script>
    @endguest

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mine.css') }}">
    @auth
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('fontawesome/svg-with-js/js/fontawesome-all.min.js') }}"></script>
    <link href="{{ asset('dataTables/css/dataTables-16.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dataTables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mine.css') }}">
     @endauth

</head>

<body>    
        <div id="app">
            @guest 
                @yield('content')
            @else            
            @yield('home-content')             
            @endguest  
        
    </div> {{-- app --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    @auth
    {{-- Icons --}}

    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
        });
    </script>
     {{-- dataTables --}}
    <script src="{{ asset('dataTables/js/dataTables-16.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- Validator --}}
    {{-- <script src="{{ asset('validator/validator.min.js') }}"></script> --}}

    <script src="{{ asset('js/typeahead.js') }}"></script>

    <script src="{{ asset('js/postest-datatable.js') }}"></script>
    @endauth
</body>

</html>
