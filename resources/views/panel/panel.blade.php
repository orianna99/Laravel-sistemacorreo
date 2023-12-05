<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | @yield('title')</title>

    {{-- Css Principal --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Css del panel --}}
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>

    @include('panel.partials.preloader')
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        {{-- header --}}
        @include('panel.partials.header')
        {{-- Menu lateral --}}
        @include('panel.partials.aside')
        {{-- Contenido principal --}}
        <div class="page-wrapper" id="app">
            @yield('main')
        </div>
    </div>










    <script src="{{ asset('js/app.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    @yield('js')
    <script src="{{ asset('js/custom.min.js') }}"></script>

</body>

</html>
