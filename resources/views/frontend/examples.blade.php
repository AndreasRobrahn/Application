@extends('frontend.general_layout')

@section('content')
<div class="container pt-2">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true">Chat</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="roles-tab" data-toggle="tab" href="#roles" role="tab" aria-controls="roles" aria-selected="false">Benutzerrechte</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="portal-tab" data-toggle="tab" href="#portal" role="tab" aria-controls="portal" aria-selected="false">Portalsarbeit</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="xxo-tab" data-toggle="tab" href="#xxo" role="tab" aria-controls="xxo" aria-selected="false">XXO</a>
    </li>
  </ul>

  {{$step = ''}}

<div class="tab-content" id="myTabContent" >
  <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
    <div class="d-flex p-2 flex-column" >
      <div class="card text-center main bg-success text-white overflow-auto" style="height: 80vh">
        <div class="card-header">
          Chat (nur moglich in meine Richtung)
        </div>
        <div class="card-body ">
            <Chat version="user"></Chat>
        </div>
        <div class="card-footer">
          <div class="row">
            Realisiert mit Laravel, vue.js und Bootstrap und MySQL
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade " id="roles" role="tabpanel" aria-labelledby="roles-tab">
          <div class="d-flex p-2 flex-column">
          <div class="card text-center main">
            <div class="card-header">
              Ein kleines Nutzer und Rechte System
            </div>
            <div class="card-body">
                <div class="col-12">
                <h3>Funktionsweise:</h3>
                </div>
                <div class="col-12">
                  <p>im Reiter "User "du kannst bis zu 3 user anlegen und Ihnen Rechte zuweisen, die Email ist optional. In dem Reiter "Userrechte festlegen" kannst du deinen erschaffenen Usern Schreib- und Leserechte für 3 Beispielaufgaben zuweisen.
                  In Karteikarte 3 kannst du sehen wie das ganze funktioniert.Alle Daten werden beim Neuladen der Seite wieder gelöscht</p>
                </div>
                <hr>
                <div class="col-lg-12">
                    <userrolessystem></userrolessystem>
                </div>

            </div>
            <div class="card-footer text-muted">
              <div class="col-lg-12">
                Realisiert mit Laravel, vue.js und Bootstrap und MySQL
              </div>
            </div>
          </div>
        </div>
      </div>

  <div class="tab-pane fade show active" id="portal" role="tabpanel" aria-labelledby="forum-tab" style="color: white:">
    <div class="container text-white">

      <nav class="navbar sticky-top navbar-expand-lg navbar-dark border border-white">
          <a class="navbar-brand " href="#">
            <img src="{{asset('images/teamyak_logo.jpg')}}" alt="hier sollte das Teamlogo sein" class="d-inline-block align-top" style="max-width: 20vh">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto text-white">
            <li class="nav-item">
              <a class="nav-link" href="#AboutUs"><b>Team Yak</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Kontakt</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Login</a>
            </li>

          </ul>
        </div>

      </nav>
        <div id="carouselExampleIndicators" class="carousel slide border border-white" data-ride="carousel">

          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="{{asset('images/bjj_vejen_teamfoto Kopie.jpeg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block" style="top :5%">
                <h2 class="font-weight-bold text-warning"><p>Team Yak in Vejen 09/19</p>
                <p>Jeg hiller muh!</p></h2>
              </div>
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/bjj07_01 Kopie.jpeg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-warning" style="top :5%">
              <h2 class="font-weight-bold text-warning"> Gruppenfoto 07/18
              <p>Sayonara altes Dojo</p></h2>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-caption d-none d-md-block text-warning" style="top :5%">
              <h2 class="font-weight-bold text-warning"> Gruppenfoto 06/19
              <p>Muuuuuuuhhhh!!!!!</p></h2>
            </div>
            <img src="{{asset('images/bjj09_01 Kopie.jpeg')}}" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="container bg-danger border-4 border-white rounded mt-5" id="AboutUs">
        <h2> Team Yak </h2>

        <p>Wer sind wir?</p>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <p>Was machen wir?</p>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
      </div>

      <div class="container bg-danger border-4 border-white rounded mt-5">
        <h2 > Kontakt </h2>
        <hr>
        <div class="row">
          <div class="col-2">
            <h4>On Social Media</h4>
          </div>
          <div class="col-10" id="contact" >
            <a class="btn btn-info btn-social-icon btn-instagram" href="https://www.facebook.com/yak.bjj.flensburg"><span class="fa fa-instagram"></span></a>
            <a class="btn btn-primary btn-social-icon btn-facebook" href="https://www.facebook.com/yak.bjj.flensburg"><span class="fa fa-facebook"></span></a>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-2">
            <h4>Adresse</h/4>
          </div>
          <div class="col-10">
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-2 text-break">
            <h4>Ansprechpartner</h/4>
          </div>
          <div class="col-10">
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('additional_css')

<style type="text/css">
.main
  {
    height: 45em;
  }
</style>

@endsection

@section('additional_js')
<script>
console.log()

</script>
@endsection
