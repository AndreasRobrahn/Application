@extends('backend.general_layout')

@section('content')
<div class="container">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Migrations</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#seeds" role="tab" aria-controls="profile" aria-selected="false">Seeds</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="contact" aria-selected="false">Chat</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="generalSettings-tab" data-toggle="tab" href="#generalSettings" role="tab" aria-controls="settings" aria-selected="false">General Settings</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <h1> Migrations</h1>
      <div class="row">
        <div class="col">
          <a href="{{route('config.migrate')}}" class="btn btn-info">Migrate</a>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="tablename">Gebe den Dateinnamen an</label>
            <input type="text" id="inputTablename" class="form-control" name="" value="">
            <small>Der Pad wurde bereits im Backend festgelegt</small>
          </div>
          <button id="submitMigrateReset" class="btn btn-info">Migrate Reset Table</button>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <a href="{{route('config.truncate.all')}}" class="btn btn-info">TruncateALL</a>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="seeds" role="tabpanel" aria-labelledby="home-tab">
      <h1> Seeds</h1>
      <div class="row">
        <div class="col">
          <a href="{{route('config.migrate')}}" class="btn btn-info">DB Seed</a>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="tablename">Gebe den Dateinnamen an</label>
            <input type="text" id="inputTablename" class="form-control" name="" value="">
            <small>Der Pad wurde bereits im Backend festgelegt</small>
          </div>
          <button id="submitMigrateReset" class="btn btn-info">Migrate Reset Table</button>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <a href="{{route('config.truncate.all')}}" class="btn btn-info">TruncateALL</a>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="home-tab">
      <h1> Chat</h1>

      <hr>
      <div class="row mt-0">
        <Chat version="admin"> </Chat>
      </div>
    </div>
    <div class="tab-pane fade" id="generalSettings" role="tabpanel" aria-labelledby="home-tab">
      <h1> General Laravel Issues</h1>

      <hr>
      <div class="row mt-0">
        logout
        <a href="{{route('logout')}}" class="btn btn-info">logout</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('additional_js')
<script>
console.log('test')
$('#submitMigrateReset').on('click', function(){

  let tablename = $('#inputTablename').val()
  // var params3 = new URLSearchParams();
  // params3.append("tablefilename", tablename);
  axios
  .get('/migrate/reset/'+tablename)
  .then(
    function(response){
      if(response.data == 1){
        alert('Fehler im Process')
      }

    })
  .catch(function(error) {
    // if(response.state == 404)
    // {
    //   alert('keine Eingabe')
    // }
    if(error.response.status == 404)
    {
      alert('keine Eingabe');
    }
    if(error.response.status == 500)
    {
      alert(error.response.data.message);
    }
    console.log(error.response);
  });
})

</script>
@endsection
