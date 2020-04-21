@extends('frontend.general_layout')
@section('content')

<div class="container">
  <div class="row">
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
		        <img src="{{ asset('images/ARobrahn.jpg')}}" alt="thumbnail" class="img-thumbnail img-fluid">
		      </div>
		      <div class="col">
		        <img src="{{ asset('images/ARobrahn.jpg')}}" alt="thumbnail" class="img-thumbnail img-fluid">
		      </div>
		      <div class="col">
		        <img src="{{ asset('images/ARobrahn.jpg')}}" alt="thumbnail" class="img-thumbnail img-fluid">
		      </div>
				</div>

			<div class="row mt-2">
        <table class="table table-bordered table-primary">
          <thead>
          <tr>
            <th><h2>Allgemeines</h2></th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th scope="row">Staatsangehorigkeit</th>
            <td>Deutsch</td>
          </tr>
          <tr>
            <th scope="row">Schulbildung</th>
            <td>Abitur Note 2,5 </td>
          </tr>
          <tr>
              <th scope="row">Ausbildung Fachinformatiker (Anwendungsentwicklung)</th>
              <td>Berufsschule Note 2,5</td>
          </tr>
          <tr>
              <th scope="row"></th>
              <td>Abschlussprüfung 76% </td>
          </tr>
          <tr>
            <th scope="row"> Familienstatus</th>
            <td>ledig</td>
          </tr>
          <tr>
            <th scope="row"> Führerschein</th>
            <td>Klasse B</td>
          </tr>
          </tbody>
        </table>
		</div>
    </div>
<<<<<<< HEAD
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
=======
      <div class="col-12 col-lg-8">
        <div class="row m-2" >
          <h2>Arbeitshistorie</h2>
          <div class="accordion" id="accordion">
            <div class="row m-2 overflow-auto border-border" style="height: 45em">
              <!-- one Card for an Employer of mine -->
              @for($i =0; $i<= count($employers)-1; $i++)
              <div class="row m-2 w-100">
                <div class="card text-white bg-dark mb-3 w-100">
                  <div class="card-header">
                    <p class="text-left">
                      <h4>{{$employers[$i]['name']}} | {{$employers[$i]['jobname']}}
                        <span class="badge badge-secondary" style="float:right;"> {{$employers[$i]['timespan']}}</span>
>>>>>>> 3c7c35161bead59074aad6dd83964cbf5581a48a

                    </h4>
                    </p>
                    <p><button class="btn btn-dark btn-lg btn-sm" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapseOne">Mehr Infos <i class="fas fa-angle-double-down"></i></button></p>
                  </div>
                  <div id="collapse{{$i}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <h5 class="card-title">Aufgabenbereich</h5>
                      <p class="card-text">{{$employers[$i]['description']}}</p>
                    </div>
                  </div>
                </div>
              </div>
              @endfor
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>
<div class="row text-center w-100">
  <h2><p class="text-center">	Hobbys </p><h2>
    <hr>
</div>
<div class="row text-left w-100">

  <div class="col-12 mt-2 col-lg-4">
    <div class="card bg-dark text-dark h-100">
      <img src="{{ asset('images/Kampfsport.png')}}" alt="Hobbyfoto" style="max-width:338px">
      <div class="card-img-overlay">
        <h5> Brasilian Jiu Jitsu </h5>
      </div>
    </div>
  </div>
  <div class="col-12 mt-2 col-lg-4">
    <div class="card bg-dark text-dark">
      <img src="{{ asset('images/Fußball.png')}}" alt="Hobbyfoto" style="max-width:338px">
      <div class="card-img-overlay">
        <h5> Sport im allgemeinen </h5>
      </div>
    </div>
  </div>
  <div class="col-12 mt-2 col-lg-4">
    <div class="card bg-dark text-dark">
      <img src="{{ asset('images/IT.png')}}" alt="Hobbyfoto" style="max-width:338px">
      <div class="card-img-overlay">
        <h5> Programmieren, Datteln etc.</h5>
      </div>
    </div>
  </div>
  <div class="col-12 mt-2 col-lg-4">
    <div class="card bg-dark text-dark">
      <img src="{{ asset('images/Wandern.png')}}" alt="Hobbyfoto" style="max-width:338px">
      <div class="card-img-overlay">
        <h5> Zeit in der Natur verbringen</h5>
      </div>
    </div>
  </div>

  <!-- @for($i = 1; $i <= 10; $i++)
  <div class="col-12 mt-2 col-lg-4">
    <div class="card bg-dark text-white">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ3hNHu6C_Mirl95OlctwbQqkdlDSmQ8TqUnQD4cJC5W4DBaHhF&usqp=CAU" alt="Hobbyfoto" style="max-width:338px">
      <div class="card-img-overlay">
        <h5> Brasilian Jiu Jitsu </h5>
      </div>
    </div>
  </div>

  @endfor -->
</div>
<hr>
<div class="row w-100 mt-3">
  <div class="col-6">
    <a href="{{route('likes.update')}}" role="button" class="btn btn-primary btn-rounded text-center btn-block btn-sm mt-2"><i class="far fa-thumbs-up"></i> Liken<span class="badge badge-secondary" style="float:right"> {{$likes}} likes </span></a>
  </div>
  <div class="col-6">
    <button type="button" class="btn btn-danger btn-rounded text-center btn-block btn-sm mt-2" data-toggle="modal" data-target="#sendmessage"> Nachricht senden</button>
  </div>
</div>

<hr>
<div class="row mt-2 text-center">
  <div class="col-12">
      <h2><p class="">	Gästebuch </p><h2>
  </div>
      @foreach($comments as $comment)
      <div class="col-12 text-left">
        <div class="card text-white bg-info mb-3">
          <div class="card-header">@ {{$comment->User}} schrieb:</div>
          <div class="card-body">
            <p class="card-text">{{$comment->Post}}</p>
          </div>
        </div>
      </div>
      @endforeach
</div>
<form action="{{route('comment.store')}}" method="post">
  @csrf
  <div class="row w-100 p-2">
    <div class="col-12">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@username</span>
          </div>
          <input type="text" class="form-control" name="user" value="anonymous" aria-describedby="basic-addon1">
        </div>
      </div>
<<<<<<< HEAD

    </div>
  </div>
	<div class="row text-center text-black">
    <div class="col">
      <h2>Hobbys</h2>
    </div>
	</div>
=======
        <div class="col-12">
          <div class="form-group">
            <label for="exampleFormControlTextarea5">Eintrag im Gästebuch</label>
            <textarea class="form-control" id="exampleFormControlTextarea5" rows="3" placeholder="Schreib was nettes an die Pinnwand" name="post"></textarea>
          </div>
        </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary btn-lg btn-block btn-sm"><i class="fas fa-paper-plane"></i> Senden</button>
    </div>
    </div>
  </div>
</form>
>>>>>>> 3c7c35161bead59074aad6dd83964cbf5581a48a
  <!-- Modal for Messages -->
  <div class="modal fade" id="sendmessage" tabindex="-1" role="dialog" aria-labelledby="modalGiftsCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
<<<<<<< HEAD
          <h4 class="modal-title w-100 font-weight-bold">Schreibe Mir</h4>
=======
          <h4 class="modal-title w-100 font-weight-bold">Schreibe mir!</h4>
>>>>>>> 3c7c35161bead59074aad6dd83964cbf5581a48a
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
				      <Chat version="user"> </Chat>
      </div>
      </div>
    </div>
  </div>



@endsection
