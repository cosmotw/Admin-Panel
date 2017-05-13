<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

    @stack('stylesheets')
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            @include('includes/sidebar')

            @include('includes/topbar')

            <div class="right_col" role="main">
                @yield('main_container')
            </div>

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Bootstrap Scripts -->
     <script src="{{ asset("js/bootstrap.js") }}"></script>

    @stack('scripts')

    <!-- Gentelella Theme Scripts -->
    <script src="{{ asset("js/gentelella.min.js") }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset("js/custom.min.js") }}"></script>
</body>
</html>