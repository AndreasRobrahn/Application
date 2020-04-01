<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>Bewerbungserweiterung Andreas Robrahn</title>

        <!-- Bootstrap css -->
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- jquery-->
        <script  src="js/jquery-3.4.1.min.js"></script>

        <!-- Bootstrap js -->
        <script  src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>


        </style>
    </head>
    <body class="p-3 mb-2 bg-white text-dark">
        <div class="flex-center position-ref full-height" id="app">
          @yield('content')
        </div>
        <!-- the js files for the app -->
        <script src="js/app.js"></script>
        @yield('additional_js')
    </body>
</html>
