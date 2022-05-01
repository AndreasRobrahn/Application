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
      <a class="nav-link" id="portal-tab" data-toggle="tab" href="#portal" role="tab" aria-controls="portal" aria-selected="false">Designelemente</a>
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
  <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
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
      <div class="tab-pane fade" id="excel" role="tabpanel" aria-labelledby="roles-tab">
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
                    </form>
                    <button type="" id="buttonFotoUpload" class="btn btn-success btn-block mt-2">Excel Datei anzeigen</button>
                  </div>
                </div>
              </div>
              <div class="container shadow-lg p-3 mt-3 bg-light rounded border border-dar" id="exceltable" >
              <h1>Das Ergebnis</h1>
                  <table class="table table-bordered" >
                    <tr>
                      <td>test</td>
                      <td>test</td>
                      <td>test</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="card-footer text-muted">
              <div class="col-lg-12">
                Realisiert mit Laravel, vue.js und Bootstrap und MySQL
              </div>
            </div>
          </div>
          <div class="tab-pane fade show active" id="portal" role="tabpanel" aria-labelledby="forum-tab" style="color: white:">
            <div class="container bg-light text-dark">
              <div class="row mt-3">
                <div class="col">
                  <div class="row p-1">
                    <h4 class="text-center">Produktkarten</h4>
                  </div>
                  <div class="row mt-4">
                    <div class="col-3">
                      <div class="bg-white shadow-lg border" style="max-width: 250px; ">
                        <div class="row-0">
                          <div class="col p-2 d-flex justify-content-center">
                            <img class="img-fluid shadow-sm designpicture1" alt="ProduktBild" style="" src="data:image/jpeg;base64,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" >
                          </div>
                        </div>
                        <div class="row m-0 justify-content-center">
                          <div class="col p-0 ">
                            <h5 class="text-center">Auto1</h5>
                          </div>
                        </div>
                        <div class="row m-0">
                          <div class="col p-0">
                            <a class="" data-toggle="collapse" href="#description2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <h5>Beschreibung</h5>
                            </a>
                            <div class="collapse" id="description2">
                              <div class="card card-body">
                                 <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="row m-0 mt-2">
                          <div class="col-4 d-flex justify-content-center">
                            <a href="#"><i class="far fa-id-card"></i></a>
                          </div>
                          <div class="col-4 d-flex justify-content-center">
                            <a href="#"><i class="fas fa-ad"></i></a>
                          </div>
                          <div class="col-4 d-flex justify-content-center">
                            <a href="#"><i class="far fa-id-card"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="bg-white shadow-lg" style="max-width: 250px; ">
                        <div class="row-0">
                          <div class="col p-0 d-flex justify-content-center">
                            <img class="img-fluid shadow-sm designpicture2" alt="ProduktBild" style="" src="data:image/jpeg;base64,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" >
                          </div>
                        </div>
                        <div class="row m-0 justify-content-center">
                          <div class="col p-0 ">
                            <h5 class="text-center">Auto2</h5>
                          </div>
                        </div>
                        <div class="row m-0">
                          <div class="col p-0">
                            <a class="" data-toggle="collapse" href="#description1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <h5>Beschreibung</h5>
                            </a>
                            <div class="collapse" id="description1">
                              <div class="card card-body">
                                 <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row m-0 mt-2">
                          <div class="col-4 bg-light d-flex justify-content-center border">
                            <a href="#"><i class="far fa-id-card"></i></a>
                          </div>
                          <div class="col-4 bg-light d-flex justify-content-center border">
                            <a href="#"><i class="fas fa-ad"></i></a>
                          </div>
                          <div class="col-4 bg-light d-flex justify-content-center border">
                            <a href="#"><i class="far fa-id-card"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col">
                      <div class="row p-1">
                        <h4>Profilkarten</h4>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-0 profilecard ">
                          <div class="row m-2 bg-white hoverelement" style="box-shadow: 0px 0px 10px;">
                            <div class="col p-0"><div class="row m-0 justify-content-center mt-3 ">
                              <div class="col-10 d-flex p-0 justify-content-center">
                                <img src="{{asset('images/arob3.jpeg')}}" class="img-fluid profilepictureInIndex">
                              </div>
                            </div>
                            <div class="row mt-2  justify-content-center">
                              <div class="col p-0">
                                <h4 class="text-center">Andreas, {{Carbon\Carbon::parse('1984-09-19')->age}}
                                  <svg class="Ellipse_96" style="height: 20px; width: 20px;">
                                    <ellipse fill="rgba(101,198,124,1)" id="Ellipse_96" rx="10" ry="10" cx="10" cy="10"></ellipse>
                                  </svg>
                                </h4>
                              </div>
                            </div>
                          <div class="row m-0 mt-2 p-1 justify-content-center bg-light">
                        <div class="col m-1 d-flex justify-content-center borderdotted sidemenuitem">
                          <i class="far fa-envelope fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="col m-1 d-flex justify-content-center borderdotted sidemenuitem">
                          <i class="fas fa-user-friends fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="col m-1 d-flex justify-content-center borderdotted sidemenuitem">
                          <i class="fas fa-kiss-wink-heart fa-2x" aria-hidden="true">
                          </i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                      </div>
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
  dictDefaultMessage: 'Dateien ablegen oder anklicken',
  dictRemoveFile: 'Entfernen',
  dictFileTooBig: 'Dateigröße zu groß',
  ictMaxFilesExceeded: 'Zu viele Dateien hochgeladen',
  // maxThumbnailFilesize: 2,
  maxFilesize: 2048,
  acceptedFiles: '.xlsx',

  init: function () {

      var myDropzone = this;
      let table = document.getElementById('exceltable')
      // Update selector to match your button
      $("#buttonFotoUpload").click(function (e) {

          e.preventDefault();
          table.innerHTML = "";
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


        let htmlObject = JSON.parse(data)
        // console.log(data)
        table.innerHTML += htmlObject
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
