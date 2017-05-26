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

    <!-- Bootstrap、Font awesome、Gentelella -->
    <link href="{{ mix("css/auth-layout.css") }}" rel="stylesheet">

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

    <!-- Bootstrap Scripts -->
     <script src="{{ asset("js/bootstrap.js") }}"></script>

    @stack('scripts')

    <!-- Gentelella Theme Scripts -->
    <script src="{{ asset("js/gentelella.min.js") }}"></script>
</body>
</html>