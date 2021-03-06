<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>Bewerbungserweiterung Andreas Robrahn</title>

        <!-- Bootstrap css -->
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-social-gh-pages/bootstrap-social.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">

        <script src="https://kit.fontawesome.com/c869b225f8.js" crossorigin="anonymous"></script>
        <!-- jquery-->
        <script  src="js/jquery-3.4.1.min.js"></script>

        <!-- Bootstrap js -->
        <script  src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
        <!-- Styles -->
        @yield('additional_css')
    </head>
    <body class="p-3 mb-2 text-dark">
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <h5><a class="nav-link text-white font-weight-bolder" href="{{route('frontend.curriculum')}}">Lebenslauf</a></h5>
        </li>
        <li class="nav-item">
          <h5><a class="nav-link text-white font-weight-bolder" href="#">Weisheiten des Andreas Robrahn</a></h5>
        </li>
        <li class="nav-item">
          <h5><a class="nav-link text-white font-weight-bolder" href="{{route('frontend.examples')}}">Progammierbeispiele</a></h5>
        </li>

      </ul>
        <div class="flex-center position-ref full-height" id="app">
          @yield('content')
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- the js files for the app -->
        <script src="js/app.js"></script>
        @yield('additional_js')


    </body>
</html>
