@extends('frontend.general_layout')
@section('additional_css')

<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">

@endsection

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
      <a class="nav-link" id="excel-tab" data-toggle="tab" href="#excel" role="tab" aria-controls="excel" aria-selected="false">Excel Verarbeitung</a>
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
  <div class="tab-pane fade" id="roles" role="tabpanel" aria-labelledby="roles-tab">
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
  <div class="tab-pane fade show active" id="excel" role="tabpanel" aria-labelledby="roles-tab">
          <div class="d-flex p-2 flex-column">
          <div class="card text-center main">
            <div class="card-header">
              Excel Verarbeitung
            </div>
            <div class="accordion" id="Excel">
              <div class="card-body">
                  <div class="col-12">
                    <h4>Funktionsweise <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDescriptionExcel" aria-expanded="true" aria-controls="collapseOne"><i class="fas fa-angle-double-down"></i>
                    </button></h4>
                  </div>
                  <div class="col-12 collapse" id="collapseDescriptionExcel" aria-labelledby="headingOne" data-parent="#collapseDescriptionExcel">
                    <p>Füge Excel Dateien ein. (Da das System sehr einfach gehalten ist, können nur simple excel dateien eingelesen werden)</p>
                  </div>
                  <hr>
                </div>
              </div>
              <div class="container shadow-lg p-3 mt-3 bg-light rounded border border-dark" >
                        <div class="row m-1 w-100">
                          <div class="form-group-12 w-100">

                            <form action="{{ route('test.excel') }}" class="dropzone" id="excelUpload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="profile" value="">
                </form>
                <small>Es sind ausschliesslich Bilddateien mit einer maximalen Größe von bis zu 2MB erlaubt.</small>
                <button type="" id="buttonFotoUpload" class="btn btn-success btn-block mt-2">Fotos speichern</button>

                          </div>
                        </div>

                      </div>
                      <div class="container shadow-lg p-3 mt-3 bg-light rounded border border-dar" id="exceltable" >
                        <table class="table table-bordered" >
                          <tr>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                          </tr>
                        </table>
                      </div>

                  <!-- <div class="col-lg-12">
                    <form class="" action="{{route('test.excel')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile01" name="file" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="inputGroupFile01">Datei wählen</label>
                        </div>
                        </div>
                        <input type="submit" name="" value="ok">
                    </form>

                  </div> -->

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

  <div class="tab-pane fade " id="portal" role="tabpanel" aria-labelledby="forum-tab" style="color: white:">
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
                <p></p></h2>
              </div>
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

<script type="text/javascript">


Dropzone.options.excelUpload = {


  autoProcessQueue: false,
  addRemoveLinks: true,
  parallelUploads: 10,
  dictDefaultMessage: 'Zum Hochladen klicken oder Fotos hinziehen',
  dictRemoveFile: 'Doch nicht',
  dictFileTooBig: 'Dateigröße zu groß',
  ictMaxFilesExceeded: 'Zu viele Dateien hochgeladen',
  // maxThumbnailFilesize: 2,
  maxFilesize: 2048,
  acceptedFiles: '.xlsx',

  init: function () {

      var myDropzone = this;
      // Update selector to match your button
      $("#buttonFotoUpload").click(function (e) {
          e.preventDefault();

          myDropzone.processQueue();

      });
      this.on('sending', function (file, xhr, formData) {
          // Append all form inputs to the formData Dropzone will POST
          var data = $('#fotoUpload').serializeArray();
          $.each(data, function (key, el) {
              formData.append(el.name, el.value);
          })
      });
      this.on("errormultiple", function (files, response) {
        console.log(response)
             });
      this.on('complete', function (response) {
        let data =response.xhr.response
        let table = document.getElementById('exceltable')
        table.innerHTML = "";

        let htmlObject = JSON.parse(data)
        // console.log(data)
        table.innerHTML = htmlObject
        console.log(table)

          // location.reload();
      });
    }
  };

$(document).ready(function(){
  console.log()

});

</script>
@endsection
