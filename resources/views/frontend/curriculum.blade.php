@extends('frontend.general_layout')
@section('content')
<div class>
  <div class="row ml-2">
	    <div class="col-12 col-lg-4">
	      <div class="row">
	        <div class="col">
	          <h2>Andreas Robrahn</h2>
	        </div>
	      </div>
	      <div class="row" style="">
	        <div class="col-12">
	          <img src="{{ asset('images/ARobrahn.jpg')}}" alt="thumbnail" class="img-thumbnail img-fluid" style="width:479px;">
	        </div>
	      </div>
				<div class="row mt-2">
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

			<div class="row mt-2">
        <table class="table table-bordered table-dark">
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
      <div class="row " >
        <h2>Arbeitshistorie</h2>
        <div class="accordion" id="accordion">
          <div class="row m-2 overflow-auto" style="height: 35em">
            <div class="row m-2">
              <div class="card">
                <div class="card-header">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Perry & Knorr | Customer Advisor für die Versatel GmbH | 2010 - 2011
                  </button>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <h5 class="card-title">Aufgabenbereich</h5>
                    <p class="card-text">das schriftliche Bearbeiten und Beantworten von Kundenbeschwerden </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row m-2">
              <div class="card">
                <div class="card-header">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
                    Perry & Knorr | Customer Advisor für die 1&1 Telekom GmbH | 2011 - 2013
                  </button>
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <h5 class="card-title">Aufgabenbereich</h5>
                    <p class="card-text">Hotlinearbeit, Beschwerdenaufnahme & -bearbeitung, Aufnahme und Verarbeitung von Bestellungen und Stornierungen</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row m-2">
              <div class="card">
                <div class="card-header">
                  CarebyPhone Gmbh | Customer Advisor für die 1&1 Telekom GmbH | 2013 - 2014
                </div>
                <div class="card-body">
                  <h5 class="card-title">Aufgabenbereich</h5>
                  <p class="card-text">Aufnahme, Beratung und Verarbeitung von Kundenanfragen</p>
                </div>
              </div>
            </div>

            <div class="row m-2">
              <div class="card">
                <div class="card-header">
                  Contevis Gmbh | Customer Advisor für die EWE GmbH | 2013 - 2014
                </div>
                <div class="card-body">
                  <h5 class="card-title">Aufgabenbereich</h5>
                  <p class="card-text">Hotlinearbeit, Beschwerdenaufnahme & -bearbeitung, Aufnahme und Verarbeitung von Bestellungen und Stornierungen</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <hr>
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
            <label for="exampleFormControlTextarea5">Eintrag im Gästebuch</label>
            <textarea class="form-control" id="exampleFormControlTextarea5" rows="3" placeholder="Schreib was nettes an die Pinnwand"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="button" class="btn btn-primary btn-lg btn-block btn-sm"><i class="fas fa-paper-plane"></i> Senden</button>
        </div>
      </div>

    </div>
  </div>
	<div class="row text-center text-black">
    <div class="col">
      <h2>Hobbys</h2>
    </div>
	</div>
  <!-- Modal for Messages -->
  <div class="modal fade" id="sendmessage" tabindex="-1" role="dialog" aria-labelledby="modalGiftsCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Schreibe Mir</h4>
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
