@extends('frontend.basis')

@section('additional_css')
<style media="screen">
	.container1
	{
		background-image: url('https://cdn.pixabay.com/photo/2016/12/15/20/21/texture-1909992_1280.jpg');
		background-size: cover;
	}
	.container2
	{
		background-image: url('https://cdn.pixabay.com/photo/2016/11/22/20/02/abstract-1850417_1280.jpg');
		background-size: cover;
	}
	.container3
	{
		background-image: url('https://cdn.pixabay.com/photo/2014/12/15/16/46/graffiti-569265_1280.jpg');
		background-size: cover;
	}
	.container4
	{
		background-image: url('https://cdn.pixabay.com/photo/2013/10/25/20/46/mosaic-200864_1280.jpg');
		background-size: cover;
	}
	.hobbyimg
	{
		object-fit: cover;
		width: 100%;
		height: 150px;
		/* border: 4px solid white; */

	}
	.box-shadow-white
	{
		box-shadow: 0px 0px 25px white;
	}
	.slick-track,.slick-list
	{
		height: 100%;
	}
	th,tr,td
	{
		cursor: pointer;
	}
	td,th
	{
		padding:0.3rem !important;
	}
	.tableColor
	{
		background-color: rgba(30, 61, 89, 0.7);
		/* opacity: 0.75; */
		border-radius: 25px;
	}
	.sliderbuttons
	{
		height: 3.5em;
		width: 3.5em;
		border-radius: 45%;
		/* background-color: orange; */
		cursor: pointer;
		margin: 5px;
		z-index: 10;
		box-shadow: 0 5px 5px black;
	}
	.wrapper
	{
		width: 75%;
		height: 75%;
		overflow-y: scroll;
	}
	.col-designed
	{
	  position: relative;
	  background-color: rgba(250, 235, 215,1);
	  color:rgb(128,128,128);
	  height: 190px;
	  width: 45%;
	}
	.flip-card {
      background-color: transparent;
      width: 100%;
      height: 100%;
      perspective: 1000px; /* Remove this if you don't want the 3D effect */
    }

    /* This container is needed to position the front and back side */
    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
      background-color: rgba(255, 255, 255, 0.8);
      margin-left: -10px;
      margin-top: -10px;
      -webkit-box-shadow: -1px 3px 8px 10px rgba(0,0,0,0.34);
      box-shadow: -1px 3px 8px 10px rgba(0,0,0,0.34);
    }

    /* Do an horizontal flip when you move the mouse over the flip box container */
    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
      background-color: transparent;
    }

    /* Position the front and back side */
    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden; /* Safari */
      backface-visibility: hidden;
      /* overflow: scroll; */
    }

    /* Style the front side (fallback if image is missing) */
    .flip-card-front {
      /* background-color: #bbb; */
			overflow-y: hidden;

		}
		.goldentext
		{
			color:  #D5AD6D; /*if no support for background-clip*/

		  background: -webkit-linear-gradient(transparent, transparent),
		             -webkit-linear-gradient(top, rgba(213,173,109,1) 0%, rgba(213,173,109,1) 26%, rgba(226,186,120,1) 35%, rgba(163,126,67,1) 45%, rgba(145,112,59,1) 61%, rgba(213,173,109,1) 100%);
		  background: -o-linear-gradient(transparent, transparent);
		  -webkit-background-clip: text;
		  -webkit-text-fill-color: transparent;
		}

    /* Style the back side */
    .flip-card-back {
      background-color: ;
      color: white;
			padding: 15px;
			overflow-y: scroll;
      /* font-weight 500; */
      transform: rotateY(180deg);
    }
	@media only screen and (max-width: 768px) {
		.wrapper
		{
			width: 95%;
			height: 95%;
		}
	}



</style>
@endsection
@section('title')
	<title>Andreas Robrahn, Lebenslauf</title>
@endsection

@section('rightcolum')
<div class="row center_items" style="height: 100vh;">
	<div class=" h-100 position-absolute center_items" style="right: 1%; width: 10%;">
		<div class="" style="display:grid;">
			<button type="button" class="sliderbuttons bg-border" name="button" id="next"><i class="far fa-arrow-alt-circle-right fa-2x"></i></button>
			<button type="button" class="sliderbuttons bg-border" name="button" id="previous"><i class="far fa-arrow-alt-circle-left fa-2x"></i></button>
		</div>

	</div>
	<div class="img-slider w-75 h-75 bordershadow1 overflow-hidden">

		<div class="container-fluid container1 center_items position-relative">

			<div class="row h-100">
				<div class="col-sm-12 center_items h-100">
					<div class=" table-responsive text-white text-left tableColor center_items box-shadow-white">
						<div class="wrapper ">
		          <h5 class="textsize2 text-center">Allgemeine Informationen</h5>
		      		<table class="table table-borderless text-white m-2 " >
				       <tbody>
				        <tr>
				          <th scope="row">Geburtsdatum</th>
				          <td>19.09.1984</td>
				        </tr>
				        <tr>
				          <th scope="row">Geboren in</th>
				          <td>Schwerin</td>
				        </tr>
		        	<tr>
		          <th scope="row">Staatsangehörigkeit</th>
		          <td>Deutsch</td>
		        </tr>
		        <tr>
		          <th scope="row">Schulbildung</th>
		          <td>Abitur Note 2,5 </td>
		        </tr>
		        <tr>
		            <th scope="row">Ausbildung Fachinformatiker (Anwendungsentwicklung)</th>
		            <td>Berufsschule Note 2,5
		            Abschlussprüfung 76% </td>
		        </tr>
		        <tr>
		          <th scope="row"> Familienstatus</th>
		          <td>ledig</td>
		        </tr>
		        </tbody>
		      </table>
		    </div>
				</div>
			</div>
			</div>
		</div>
		<div class="container-fluid container2 center_items position-relative">
			<div class="row h-100">
				<div class="col-sm-12 center_items h-100">
					<div class=" table-responsive text-white text-center tableColor center_items box-shadow-white">
						<div class="wrapper">

		          <h5 class="textsize2">Eine Selbsteinschätzung</h5>
						  <table class="table table-borderless text-white text-left" >
						    <tbody>
						    <tr>
						      <th scope="row">PHP</th>
						      <td>
										<span class="material-icons">
											star
										</span>
										<span class="material-icons">
											star
										</span>
										<span class="material-icons">
											star
										</span>
										<span class="material-icons">
											star
										</span>
										<span class="material-icons text-dark">
											star
										</span>

									</td>
						    </tr>
						    <tr>
						      <th scope="row">Laravel</th>
						      <td><span class="material-icons">
										star
									</span>
									<span class="material-icons">
										star
									</span>
									<span class="material-icons">
										star
									</span>
									<span class="material-icons text-dark">
										star
									</span>
									<span class="material-icons text-dark">
										star
									</span> </td>
						    </tr>
						    <tr>
						      <th scope="row">MySQL </th>
						      <td><span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons text-dark">
 										star
 									</span>  </td>
						    </tr>
						    <tr>
						      <th scope="row">MSSQL</th>
									<td><span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons text-dark">
 										star
 									</span>
 									<span class="material-icons text-dark">
 										star
 									</span>
 									<span class="material-icons text-dark">
 										star
 									</span>  </td>
						    </tr>
						    <tr>
					        <th scope="row">Bootstrap</th>
									<td><span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons text-dark">
 										star
 									</span>
 									<span class="material-icons text-dark">
 										star
 									</span>  </td>
						    </tr>

						    <tr>
						      <th scope="row"> Vue Js</th>
									<td><span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons text-dark">
 										star
 									</span>
 									<span class="material-icons text-dark">
 										star
 									</span>  </td>
						    </tr>
						    <tr>
						      <th scope="row"> Javascript</th>
									<td><span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons">
 										star
 									</span>
 									<span class="material-icons text-dark">
 										star
 									</span>  </td>
						    </tr>
						    </tbody>
						  </table>
						</div>

					</div>
			</div>
			</div>
		</div>
		<div class="container-fluid container3 center_items position-relative">
			<div class="row h-100">
				<div class="col-sm-12 center_items h-100">
					<div class=" table-responsive text-white text-center tableColor center_items box-shadow-white">
						<div class="wrapper" style="height: 20em;">

						<h2 class="goldentext text-center">gesammelte Erfahrungen</h2>
						<hr class="w-50" style="border: 2px solid white;">
						<div class="row m-0 h-100 center_items">
						<!-- one Card for an Employer of mine -->
						@for($i=0; $i <= (count($employers))-1; $i++ )
                  <div class="col-12 h-25 w-75 p-1 position-relative box-shadow-white" style="">
                    <div class="flip-card  ">
                      <div class="flip-card-inner" style="">
                        <div class="flip-card-front">
                          <div class="row h-100 m-0 align-items-center bg-dark">
                            <div class="col-5 ">
															@if(isset($employers[$i]['link']))
                              	<img src="{{$employers[$i]['link']}}" class="img-fluid shadow-lg @if($i == 3 or $i == 4) bg-light @endif" alt="" style="object-fit: cover;border: 5px solid white;">
															@endif
														</div>
                            <div class="col-7 p-0 text-left" style="font-size: 0.8em;">

                              <span class="goldentext">{{$employers[$i]['jobname']}}</span>
                              <span class="goldentext">{{$employers[$i]['name']}}</span><br>
                              <span class="goldentext">{{$employers[$i]['timespan']}}</span><br>
                              <span class="goldentext"><small>hover über mich für weitere Infos</small></span>
                            </div>
                          </div>
                        </div>
                        <div class="flip-card-back bg-dark">
                          <div class="row">
														<div class="col p-2">
															<p class="goldentext">Beschreibung</p>
														</div>

                          </div>
                          <div class="row" style="">
														<div class="col p-2">
															<p class="goldentext">{{$employers[$i]['description']}}</p>

														</div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endfor
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
		<div class="container-fluid container4 center_items position-relative">
			<div class="row h-100">
				<div class="col-sm-12 center_items h-100">
					<div class=" table-responsive text-white text-center tableColor center_items box-shadow-white">
						<div class="wrapper" style="height: 20em;">


			<div class="row text-center w-100 center_items">
			  <h2><p class="text-center text-white">	Hobbys </p><h2>
			    <hr>
			</div>
			<div class="row text-left w-100 center_items m-0 textsize1">

			  <div class="col-10 col-md-6 p-1">
			    <div class="card bg-dark text-dark h-100 box-shadow-white">
			      <img src="{{ asset('images/Kampfsport2.jpg')}}" class="hobbyimg"alt="Hobbyfoto" style="">
			      <div class="card-footer text-white">
			          <h5> Brasilian Jiu Jitsu </h5>
			      </div>
			    </div>
			  </div>
			  <div class="col-10 col-md-6 p-1">
			    <div class="card bg-dark text-dark box-shadow-white">
			      <img src="{{ asset('images/Fußball2.jpg')}}" alt="Hobbyfoto" class="hobbyimg">
			      <div class="card-footer text-white">
			          <h5> Mannschaftssport</h5>
			      </div>
			    </div>
			  </div>
			  <div class="col-10 col-md-6 p-1">
			    <div class="card bg-dark text-dark box-shadow-white">
			      <img src="{{ asset('images/IT2.jpg')}}" alt="Hobbyfoto" class="hobbyimg">
			      <div class="card-footer text-white">
			          <h5> PC Tätigkeiten</h5>
			      </div>
			    </div>
			  </div>
			  <div class="col-10 col-md-6 p-1">
			    <div class="card bg-dark text-dark box-shadow-white">
			      <img src="{{ asset('images/Wandern2.jpg')}}" alt="Hobbyfoto" class="hobbyimg">
			      <div class="card-footer text-white">
			          <h5> Zeit in der Natur</h5>
			      </div>
			    </div>
			  </div>
			  <div class="col-10 col-md-6 p-1">
			    <div class="card bg-dark text-dark box-shadow-white">
			      <img src="{{ asset('images/Kultur2.png.jpg')}}" alt="Hobbyfoto" class="hobbyimg">
			      <div class="card-footer text-white">
			          <h5>Freunde & neue Leute</h5>
			      </div>
			    </div>
			  </div>
			  <div class="col-10 col-md-6 p-1">
			    <div class="card bg-dark text-dark box-shadow-white">
			      <img src="{{ asset('images/Lesen.jpg')}}" alt="Hobbyfoto" class="hobbyimg">
			      <div class="card-footer text-white">
			          <h5> Lesen</h5>
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

@section('additional_js')
<script type="text/javascript">
function blurTable()
{

}
$('.img-slider').slick({
	// infinite: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	prevArrow: '#previous',
	nextArrow: '#next',
	autoplay: false,
	autoplaySpeed: 4000,
	speed: 500,
	fade: true,
	cssEase: 'linear',


	// prevArrow: true,
});
$('tr').mouseover(function(){
	let parent= $(this).parent().css( "color", "transparent" );
 	$(this).parent().css( "text-shadow", "0 0 2px rgba(255,255,255,0.5)" );
	$(this).css( "text-shadow", "0 0 0px rgba(255,255,255,0.5)" );
	$(this).css( "color", "white" );

	}).mouseout(function() {
		// console.log('test')
    $(this).parent().css( "color", "white" );
    $(this).css( "text-shadow", "" );
    $(this).css( "color", "" );
	});
</script>

@endsection
