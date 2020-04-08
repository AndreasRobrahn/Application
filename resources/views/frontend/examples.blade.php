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
  <div class="tab-pane fade " id="chat" role="tabpanel" aria-labelledby="chat-tab">
    <div class="d-flex p-2 flex-column" >
      <div class="card text-center main">
        <div class="card-header">
          Chat (nur moglich in meine Richtung)
        </div>
        <div class="card-body">
          <h5 class="card-title"></h5>
          @if(!$step=1)
            Konversation suchen
            <form action="#" method="post">
              @csrf

            <input type="number" name="ConvID"> Konversationsid
            <input type="text" name="key"> Key
            <input type="submit" > Absenden
        @endif
            <Chat user="@if($step) 1 @else 0 @endif"></Chat>
        </div>
        <div class="card-footer text-muted">
          Realisiert mit Laravel, vue.js und Bootstrap und MySQL
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade show active" id="roles" role="tabpanel" aria-labelledby="roles-tab">
          <div class="d-flex p-2 flex-column">
          <div class="card text-center main">
            <div class="card-header">
              Ein kleines Nutzer und Rechte System
            </div>
            <div class="card-body">
              <h5 class="card-title">Funktionsweise: du kannst bis zu 3 user anlegen und Ihnen Rechte zuweisen,<br>
                in Karteikarte 3 kannst du sehen wie das ganze funktioniert. <br>

                Alle Daten werden beim Neuladen der Seite wieder gelöscht</h5>
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
