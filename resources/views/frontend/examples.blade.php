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
  <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
    <div class="d-flex p-2 flex-column" >
      <div class="container text-center main bg-dark text-white" style="height: auto">
        <div class="row">
          <div class="col-lg-12">
            <h2>The Eternal Chat</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <Chat version="user"></Chat>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
              <h4>Realisiert mit Laravel, vue.js und Bootstrap und MySQL</h4>
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
                <div class="col-12">=
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

  <div class="tab-pane fade" id="portal" role="tabpanel" aria-labelledby="forum-tab" style="color: white:">
    <div class="container bg-white ">
      <div class="row text-center">
        <div class="col-lg-4">
          <div class="row text-white bg-secondary ">
            <h2>Elemente</h2>
          </div>
          <div class="row bg-info text-white">
            <div class="col-12 p-0">
              <a href="{{route('example.teamyak')}}" class="text-reset" id='previewlink'><h5> eine Startseite</h5></a>
            </div>
            <div class="col-12 p-0">
              <a href="#" class="text-reset">userforum</a>
            </div>
            <div class="col-12 p-0">
              <a href="#" class="text-reset" >sonstige Elemente</a>
            </div>
          </div>
        </div>
          <div class="col-lg-8 border border-white text-center">
            <div class="row text-white bg-secondary">
              <h2>Preview</h2>
            </div>
            <div class="row">
              <div class="container p-0" id="preview">

              </div>
            </div>

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
  .border {
    border-width:3px !important;
}
</style>

@endsection

@section('additional_js')
<script>

$("#previewlink").click(function() {
  event.preventDefault();
  // console.log(this)
  $("#preview").load(this.href)
});
console.log()

</script>
@endsection
