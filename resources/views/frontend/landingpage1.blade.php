@extends('frontend.basis')

@section('additional_css')
<style media="screen">
	body
	{
		height: 100vh;
		margin: 0px;
	}
	.slick-track
	{
		height: 100%;
	}
	.modal-content
	{
		background-color: transparent;
		/* animation: slideFromTop 1s ease-in; */
	}

	/* Animations */
	@keyframes slideFromTop {

	  from{
	    top: -100%;
	  }
	  To{
	    top: 0%;
	  }
	}

</style>
@endsection

@section('description')
<meta description="Willkommen auf meiner Seite. Hier erfährst du einige wichtige Infos über mich und meinen Werdegang. Zugleich erhälst du einen besseren Eindruck über meinen Entwicklungsstand"/>
@endsection

@section('keywords')
<meta keywords="PHP Javascript Laravel VueJS BootstrapDeveloper"/>
@endsection

@section('title')
	<title>Andreas Robrahn, wie er leibt und lebt</title>
@endsection

	@section('rightcolum')
	<div class="wrapper" id="wrapper1">
				<div class="row h-50 justify-content-center align-items-center" >
					<div class="col-1 center_items nextarrow p-0">
						<i class="far fa-arrow-alt-circle-left fa-2x"></i>
					</div>
					<div class="col-9 col-md-8 h-100 img-slider d-flex justify-content-center p-1" style="height: 90%;">
						<div class="d-flex justify-content-center p-4">
							<img class=" picLandingpage2 cover"  src="{{asset('images/arob3.jpeg')}}"alt="Bewerbungsfoto">
						</div>
						<div class="d-flex justify-content-center p-4">
							<img class=" picLandingpage2 cover" src="{{asset('images/ARobrahn.jpg')}}" id="" alt="Bewerbungsfoto" >
						</div>

						<div class="d-flex justify-content-center p-4">
							<img class=" picLandingpage2 cover" src="{{asset('images/arob5.jpeg')}}" alt="Bewerbungsfoto">
						</div>

						<div class="d-flex justify-content-center p-4">
							<img class=" picLandingpage2 cover"  src="{{asset('images/arob4.jpeg')}}"alt="Bewerbungsfoto">
						</div>
					</div>
					<div class="col-1 center_items prevarrow p-0">
							<i class="far fa-arrow-alt-circle-right fa-2x"></i>
					</div>
				</div>
				<div class="row h-50 m-0 align-items-center justify-content-center textsize1 ">
						<div class="col-10 rounded text-black bordershadow1">
							<div class="h-100 w-100 third p-4">
								<h3>Moin Moin</h3>
								<p class="mt-3">
								Willkommen auf meiner eigens designten, entwickelten und gehosteten Webapplikation. Diese Seite soll dir deine Entscheidung erleichtern. Auf den Links kannst du einen ausführlicheren Lebenslauf und diverse Module testen die ich schon entwickelt habe.</p>
							</div>
					</div>
				</div>
		</div>
@endsection

@section('additional_modal')

@endsection

@section('additional_js')
<script type="text/javascript">
$('.img-slider').slick({
	infinite: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	prevArrow: '.nextarrow',
	nextArrow: '.prevarrow',

	// prevArrow: true,
});


</script>
@endsection
