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
      <a class="nav-link" id="xxo-tab" data-toggle="tab" href="#xxo" role="tab" aria-controls="xxo" aria-selected="false">XXO</a>
    </li>
  </ul>

  {{$step = ''}}

<div class="tab-content" id="myTabContent" >
  <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
    <div class="d-flex p-2 flex-column" >
      <div class="card text-center main" style="height: 53em">
        <div class="card-header">
          Chat (nur moglich in meine Richtung)
        </div>
        <div class="card-body">

            <Chat version="user"></Chat>
        </div>
        <div class="card-footer text-muted">
          Realisiert mit Laravel, vue.js und Bootstrap und MySQL
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
              <userrolessystem></userrolessystem>
            </div>
            <div class="card-footer text-muted">
              Realisiert mit Laravel, vue.js und Bootstrap und MySQL
            </div>
          </div>
        </div>
      </div>

  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

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
