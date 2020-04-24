@extends('frontend.general_layout')


@section('content')

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
<div class="container">

  <div class="row" style="">
    <div class="col-lg-6 mt-2" id="landingpage-col">
      <img src="{{ asset('images/ARobrahn.jpg')}}" id="landingpage-img">
    </div>
    <div class="col-lg-6 mt-2" id="landingpage-col">
      <p class="text-justify text-info text-wrap font-weight-bold"> Sehr geehrter Besucher. Vermutlich bist du aufgrund meiner Bewerbung hier. Auf dieser Seite kannst du dir einen bessereren Überblick über meine Fähigkeiten und Arbeitshistorie machen. Unter dem Reiter "Lebenslauf" findest du einen <b> erweiterten Lebenslauf</b> und eine Seite in der mehr Zeit ins Design investiert wurde. Der selbstironische Reiter "Weisheiten des.." befindet sich noch in der Bearbeitung. Unter "Programmierbeispiele" schalte ich nach und nach einen kleinen Katalog meiner bisher erworbenen Kenntnisse frei. Viel Spaß, Andreas Robrahn</p>
  </div>
</div>

</div>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="modalGiftsCreate" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Login</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>

@endsection
@section('additional_js')
<script type="text/javascript">

  document.addEventListener('keydown', function(event) {
  if (event.ctrlKey && event.key === 'l') {
    $('#login').modal('show')
  }
});
</script>

@endsection
