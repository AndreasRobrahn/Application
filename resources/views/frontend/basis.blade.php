<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@yield('description')
@yield('title')
<link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://kit.fontawesome.com/c869b225f8.js" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- jquery-->
<script  src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap js -->
<script  src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('slick-1.8.1/slick/slick.css')}}"/>
<link rel="stylesheet" type="text/css" id="applicationStylesheet" href="{{asset('css/landingpage1.css')}}"/>

<script type="text/javascript" src="{{asset('slick-1.8.1/slick/slick.min.js')}}"></script>
<script id="applicationScript" type="text/javascript" src="{{asset('js/landingpage1.js')}}"></script>

</head>
@yield('additional_css')
<body >
	<div class="container-fluid rounded">
		<div class="row justify-content-center" id="mainrow" style="height: 100vh;">
			<div class="col-sm-12 col-md-4 p-2 second position-relative" id="leftcolumn">
				<svg xmlns="http://www.w3.org/2000/svg" class="" viewBox="0 0 1440 320" style="" id="curvedborder">
					<path fill="#f5f0e1" class="" fill-opacity="1" d="M0,128L80,128C160,128,320,128,480,106.7C640,85,800,43,960,42.7C1120,43,1280,85,1360,106.7L1440,128L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
				</svg>
				<div class="row " id="firstrowleft">
					<div class="w-100 h-100 d-flex justify-content-center align-items-center">
						<div class="col-sm-8 col-md-10 h-100">
							<div class="row h-100 center_items">
								<div class="col-sm-10 h-100 center_items" id="headline">
									<a href="{{route('frontend.landingpage')}}">
										<div class="d-block p-3"  id="aboutme" style="">
											<div class="d-block mt-2 secondO2 p-4" style="position: relative; border-radius: 25px; width: auto; box-shadow: 0px 0px 25px white;">
											<img src="https://cdn.pixabay.com/photo/2018/01/17/20/22/analytics-3088958_1280.jpg" class=" h-100 w-100 rounded" alt="Codebiespiele" style="position: absolute; top: 0px; left: 0px; z-index: -1;">
											<h2 class="text-center text-white">Andreas Robrahn</h2>
											<p class="text-center text-white textsize1">Fachinformatiker</p>
											<p class="text-center text-white textsize1">Frontend & Backend</p>
										</div>
									</div>
								</a>
								</div>
							</div>
						</div>

						</div>
					</div>
					<div class="row h-50 align-items-center text-white text-center" >
							<div class="col-12 m-2 rounded h-100 center_items">
								<div class="menuborder center_items h-75 w-75">
									<div class="menu-wrapper h-100 w-100 center_items" id="menu" style="position:relative; border-radius: 25px;">
											<div class="menu rounded-circle center_items bg-border" id="menutoggler" style="">
												<span class="material-icons h-100 w-100 text-white" id="fingerprint">
												fingerprint
												</span>
												<h5 style="position: absolute; background-color: rgba(255,255,255,0.6); color:black; font-size: 1.3em; font-weight: bold; border-radius: 25px;">Menü</h5>
											</div>
											<div class="submenu1 rounded-circle center_items p-3">
												<a href="{{route('frontend.curriculum')}}"><p class="m-0">Lebenslauf</p></a>

											</div>
											<div class="submenu2 rounded-circle center_items p-3">
												<a href="{{route('chat')}}">
													<p class="m-0">Chat</p>
												</a>
											</div>
											<div class="submenu3 rounded-circle center_items">
												<p class="m-0">Bilder</p>
											</div>
											<div class="submenu4 rounded-circle center_items">
												<p class="m-0">Spiele</p>
											</div>
											<div class="submenu5 rounded-circle center_items">
												<p class="m-0">Ansichten</p>
											</div>
											<div class="submenu6 rounded-circle center_items">
												<p class="m-0">xyz</p>
											</div>
									</div>
								</div>
							</div>
						</div>
			</div>
			<div class="col-sm-12 col-md-8 p-2 third " style="height: auto; z-index:10;">
				@yield('rightcolum')
			</div>
		</div>
	</div>
	<div class="modal m-0" id="menuModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog h-100 m-0" role="document">
	    <div class="modal-content h-100 w-100">
	      <div class="h-100 w-100 modalbg">
					<div class="row h-100 align-items-center text-white text-center" >
							<div class="col-12 m-2 rounded h-100 center_items position-relative">
								<button type="button" class="btn bg-dark"name="button" onclick="closeModal()" style="position: absolute; top: 2%; right:5%;">
									<span class="material-icons text-white">
										close
									</span>
								</button>
									<div class="row center_items" id="" style="">

											<div class="col-5 col-sm-5 p-1 center_items">
												<div class="smenu_Mobile center_items p-3">
											<a href="{{route('frontend.curriculum')}}"><p class="m-0">Lebenslauf</p></a>
												</div>
											</div>
											<div class="col-5 col-sm-5 p-1 center_items">
												<div class=" smenu_Mobile center_items p-3">
													<p class="m-0">Chat</p>
												</div>
											</div>
											<div class="col-5 col-sm-5 p-1 center_items">
												<div class="smenu_Mobile center_items">
													<p class="m-0">Bilder</p>
												</div>
											</div>
											<div class="col-5 col-sm-5 col-4 p-1 center_items">
											<div class="smenu_Mobile center_items">
												<p class="m-0">Spiele</p>
											</div>
											</div>
											<div class="col-5 col-sm-5 col-4 p-1 center_items">
											<div class="smenu_Mobile center_items">
												<p class="m-0">Ansichten</p>
											</div>
											</div>
											<div class="col-5 col-sm-5 p-1 center_items">
											<div class="smenu_Mobile center_items">
												<p class="m-0">xyz</p>
											</div>
											</div>
									</div>
								</div>
								<!-- <h3>Novize in:</h3>
								<hr class="w-50">
								<p>Laravel</p>
								<hr class="w-50">
								<p>Vuejs</p>
								<hr class="w-50">
								<p>Mysql</p>
								<hr class="w-50">
								<p>Bootstrap</p>
								<hr class="w-50">
								<p>Github</p> -->
							</div>
						</div>

	      </div>
	    </div>
	  </div>

	@yield('additional_modal')
	@yield('additional_js')
	<script type="text/javascript">

	function closeModal()
	{
		// console.log('test')
		// $('#menuModal').toggle()
		$("#menuModal").animate({
			top: '-100%',
		});
		// $('#menuModal').toggle()
	}

	$(document).ready(function(){

		let menustate = 1


		document.addEventListener('keydown', function(event) {
	  if (event.ctrlKey && event.key === 'l') {
	    $('#login').modal('show')
	  }
	});
	$('#menutoggler').click(function()
	{
		if ($(window).width() < 769 || $(window).height() < 415) {
			// console.log('test')
			$("#menuModal").animate({
				top: '0%',
			});
	}
	else {

		let height = $('#menu').height()/2 - 40
		let left = $('#menu').width()/2 - 40

		if (menustate == 1) {

		// console.log('menu open')

		$(".submenu1").animate({
			left: '1%',
			top: '17%',
		});
		$(".submenu2").animate({
			left: left,
			top: '1%',
		});

		$(".submenu3").animate({
			right: '1%',
			top: '17%',
		});
		$(".submenu4").animate({
			left: '1%',
			bottom: '17%',
		});
		$(".submenu5").animate({
			left: left,
			bottom: '1%',
		});
		$(".submenu6").animate({
			right: '1%',
			bottom: '17%',
		});
		menustate = 2
	}
	else {
		// console.log('menu close')

		$(".submenu1,.submenu2").animate({
			left: left,
			top: height,
		});
		$(".submenu4").animate({
			left: left,
			bottom: height,
		});
		$(".submenu5").animate({
			right: left,
			bottom: height,
		});
		$(".submenu3").animate({
			right: left,
			top: height,
		});
		$(".submenu6").animate({
			right: left,
			bottom: height,
		});
		menustate = 1
	}
	}})});

	</script>
</body>
</html>
