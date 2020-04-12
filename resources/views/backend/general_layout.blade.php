<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Config</title>

        <!-- Bootstrap css -->
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="css/main.css" rel="stylesheet"> -->
        <!-- jquery-->
        <script  src="js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap js -->
        <script  src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
        
        <!-- Styles -->
        @yield('additional_css')
    </head>
    <body class="p-3 mb-2 bg-white text-dark">
        <div class="flex-center position-ref full-height" id="app">
          @yield('content')
        </div>
     	<script  src="js/app.js"></script>
        @yield('additional_js')
    </body>
</html>
