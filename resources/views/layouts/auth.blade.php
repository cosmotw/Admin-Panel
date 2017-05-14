<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Auth Page</title>

    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

    @stack('stylesheets')
</head>
<body class="login">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @yield('login_content')
            </section>
        </div>
    </div>
    <!-- Bootstrap Scripts -->
     <script src="{{ asset("js/bootstrap.js") }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset("js/gentelella.min.js") }}"></script>

    @stack('scripts')
</body>
</html>