@extends('frontend.general_layout')
@section('content')
<div class>
  <div class="row">
	    <div class="col-12 col-lg-4">
	      <div class="row">
	        <div class="col">
	          <h2>Andreas Robrahn</h2>
	        </div>
	      </div>
	      <div class="row" style="">
	        <div class="col-12">
	          <img src="https://frechelust.de/img/female-placeholder.jpg" alt="thumbnail" class="img-thumbnail img-fluid" style="width:479px;">
	        </div>
	      </div>
				<div class="row">
					<div class="col">
		        <img src="https://frechelust.de/img/female-placeholder.jpg" alt="thumbnail" class="img-thumbnail img-fluid">
		      </div>
		      <div class="col">
		        <img src="https://frechelust.de/img/female-placeholder.jpg" alt="thumbnail" class="img-thumbnail img-fluid">
		      </div>
		      <div class="col">
		        <img src="https://frechelust.de/img/female-placeholder.jpg" alt="thumbnail" class="img-thumbnail img-fluid">
		      </div>
				</div>

			<div class="row">
      <table class="table mt-1 mb-3">
        <thead>
        <tr>
          <th><h2>generelle Informationen</h2></th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <th scope="row"><i class="fas fa-male"></i> Staatsangehorigkeit</th>
          <td>Deutsch</td>
        </tr>
        <tr>
          <th scope="row"><i class="fas fa-cut"></i> Schulbildung</th>
          <td><div class="row">
          	Abitur Note 2,5
          </div>
					<div class="row">
          	Ausbildung FI Note 2,5
          </div></td>

        </tr>
        <tr>
          <th scope="row"><i class="fas fa-heart"></i> Familienstatus</th>
          <td>ledig</td>
        </tr>
        <tr>
          <th scope="row"><i class="fas fa-pencil-paintbrush"></i> Tattos</th>
          <td>Ja</td>
        </tr>
        <tr>
          <th scope="row"><i class="fas fa-rings-wedding"></i> Piercings</th>
          <td>Ja</td>
        </tr>
        <tr>
          <th scope="row"><i class="fas fa-venus-mars"></i> Führerschein</th>
          <td>Klasse B</td>
        </tr>
        </tbody>
      </table>
		</div>
    </div>
    <div class="col-12 col-lg-8">
      <div class="row">
        <h2>Arbeitshistorie</h2>
      </div>
      <div class="row">
        <div class="col-6">
          <button type="button" class="btn btn-primary btn-rounded text-center btn-block btn-sm mt-2"><i class="far fa-thumbs-up"></i> Liken</button>
        </div>
        <div class="col-6">
          <button type="button" class="btn btn-danger btn-rounded text-center btn-block btn-sm mt-2" data-toggle="modal" data-target="#sendmessage"> Nachricht senden</button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group green-border-focus mt-3">
            <label for="exampleFormControlTextarea5">Profilkommentar</label>
            <textarea class="form-control" id="exampleFormControlTextarea5" rows="3" placeholder="Schreib was nettes an die Pinnwand"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="button" class="btn btn-primary btn-lg btn-block btn-sm"><i class="fas fa-paper-plane"></i> Senden</button>
        </div>
      </div>
      <section class="my-5">
        <div class="row">
        <div class="col-lg-12">
          <div class="mdb-feed" id="messageFeed">
            <div class="news" v-for="news in feed">
              <div class="label">
                <a class="thumbs" data-toggle="tooltip" data-placement="top" title="I don't like it">
                <i class="fas fa-thumbs-down"></i>
                </a>
                <div class="collapse" id="collapseExample-1">
                <div class="card card-body mt-1">
                  <div class="md-form mt-1 mb-1">
                  <textarea type="text" id="form7" class="form-control md-textarea" rows="3"></textarea>
                  <label for="form7">Kommentar hinzufügen</label>
                  </div>
                  <div class="d-flex justify-content-end">
                  <button type="button" class="btn btn-flat waves-effect" data-toggle="collapse" data-target="#collapseExample-1"
                    aria-expanded="false" aria-controls="collapseExample-1">Abbrechen</button>
                  <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample-1"
                    aria-expanded="false" aria-controls="collapseExample-1">Antworten</button>
                  </div>

                </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
            <div>
        </div>
      </section>
    </div>
  </div>
	<div class="row text-center">
		<p class="text-center">	Hobbys </p>
	</div>
  <!-- Modal for Messages -->
  <div class="modal fade" id="sendmessage" tabindex="-1" role="dialog" aria-labelledby="modalGiftsCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Schreibe Mir, ich erhalte eine Nachricht auf mein Smartphone. Wenn ich Zeit habe antworte ich</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
				<chat version="user"> </chat>
      <!--Body-->

  </div>
  </div>
  </div>
</div>
</div>
\
@endsection
