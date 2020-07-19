<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="https://use.fontawesome.com/9514306e43.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/side.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">

</head>

<body>
    @include('layouts._sidebar')

    <div id="app">



        <div class="page-content p-5" id="content">


            <div id="simpleNav" class="d-flex justify-content-between">

                <div class="p-2">
                    <button id="sidebarCollapse" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4">
                        <i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">NavBar</small>
                    </button>
                </div>


            </div>
            <!-- Navbar-toggler  -->

            <div class="container" id="showcase">

                @yield('content')
            </div>
        </div>
    </div>


</body>

</html>