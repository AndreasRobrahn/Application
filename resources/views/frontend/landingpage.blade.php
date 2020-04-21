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
  <div class="row" style="padding:10em">
    <div class="col">
      <img src="{{ asset('images/ARobrahn.jpg')}}" class="img-fluid">
    </div>
    <div class="col">
      <p class="text-justify text-info text-wrap font-weight-bold"> Sehr geehrter Besucher. Vermutlich bist du aufgrund meiner Bewerbung hier. Auf dieser Seite kannst du dir einen bessereren Überblick über meine Fähigkeiten und Arbeitshistorie machen. Unter dem Reiter "Lebenslauf" findest du einen <b> erweiterten Lebenslauf</b> und eine Seite in der mehr Zeit ins Design investiert wurde. Der selbstironische Reiter "Weisheiten des.." befindet sich noch in der Bearbeitung. Unter "Programmierbeispiele" schalte ich nach und nach einen kleinen Katalog meiner bisher erworbenen Kenntnisse frei. Viel Spaß, Andreas Robrahn</p>
  </div>
</div>

</div>


@endsection
@section('additional_js')


@endsection
