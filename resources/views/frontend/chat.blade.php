@extends('frontend.basis')

@section('additional_css')
<style media="screen">


</style>
@endsection

@section('description')
<meta description="In diesem Teil prasentiere ich ein Chatsystem. Man kann sich einen Avatar erstellen und einfach loschatten"/>
@endsection

@section('keywords')
<meta keywords="Chat, Chatten, Vue Js, BootstrapDeveloper"/>
@endsection

@section('title')
	<title>Das Labor präsentiert einen Chat</title>
@endsection

@section('rightcolum')
	<div class="container-fluid text-center text-white center_items p-2" id="app" style="height: 100%;">
		<div class="wrapper h-75 tableColor w-100">


		<div class="row center_items m-2" style="height: 5%;">
			<div class="col-lg-12 p-2">
				<h2>The Eternal Chat</h2>
			</div>
		</div>
		<div class="row p-1"  style="height: 85%;">
			<div class="col-lg-12 h-100">
				<Chat version="user"></Chat>
			</div>
		</div>
		<div class="row center_items m-2" style="height: 8%;">
			<div class="col-lg-12">
					<h4>Realisiert mit Laravel, vue.js und Bootstrap und MySQL</h4>
			</div>

		</div>
	</div>
</div>

@endsection

@section('additional_modal')

@endsection

@section('additional_js')
<script src="js/app.js"></script>
<script type="text/javascript">

$(document).ready(function(){


});

</script>
@endsection
