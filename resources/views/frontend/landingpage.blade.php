@extends('frontend.general_layout')


@section('content')

<ul class="nav justify-content-center">
  <li class="nav-item">
    <h5><a class="nav-link text-white font-weight-bolder" href="#">Lebenslauf</a></h5>
  </li>
  <li class="nav-item">
    <h5><a class="nav-link text-white" href="#">Weisheiten des Andreas Robrahn</a></h5>
  </li>
  <li class="nav-item">
    <h5><a class="nav-link text-white" href="{{route('frontend.examples')}}">Progammierbeispiele</a></h5>
  </li>

</ul>
<div class="container">
  <div class="row" style="padding:10em">
    <div class="col">
      <img src="{{ asset('images/ARobrahn.jpg')}}" style="max-width: 500px">
    </div>
    <div class="col">
      <p class="text-justify text-primary text-wrap font-weight-bold"> Sehr geehrter Besucher. Vermutlich bist du aufgrund meiner Bewerbung hier. Auf dieser Seite kannst du dir einen besserer Uberblick uber meine Faigkeiten und Arbeitshistorie machen. Viel Spaß, Andreas Robrahn</p>
  </div>
</div>

</div>

  <div class="footer" style="
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;">
      <p class="text-white">Place sticky footer content here.</p>
    </div>

@endsection
@section('additional_js')


@endsection
