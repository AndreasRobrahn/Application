<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>Bewerbungserweiterung Andreas Robrahn</title>

        <!-- Bootstrap css -->
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-social-gh-pages/css/bootstrap-social.css" rel="stylesheet">
        <!-- <link href="css/main.css" rel="stylesheet"> -->

        <script src="https://kit.fontawesome.com/c869b225f8.js" crossorigin="anonymous"></script>
        <!-- jquery-->
        <script  src="js/jquery-3.4.1.min.js"></script>

        <!-- Bootstrap js -->
        <script  src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
        <!-- Styles -->
        @yield('additional_css')
        <style media="screen">
        .img-overlay{
          position:relative;
          display:inline-block;
          }
          .img-overlay .overlay-text{
          position:absolute;
          top:0;
          left:0;
          width:100%;
          height:100%;
          opacity:1;
          }
        </style>
    </head>
    <body class="bg-white text-dark">
      <div class="container-fluid p-0 text-white">
        <div class="row justify-content-center">
            <img src="{{asset('images/teamyak_logo.jpg')}}" alt="hier sollte das Teamlogo sein" class="d-inline-block align-top" style="max-width: 10vh">
        </div>
          <div class="img-overlay">
            <img src="https://images.pexels.com/photos/1450155/pexels-photo-1450155.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="card-img" alt="..." id="promoimage">
            <div class="overlay-text">
              <div class="row justify-content-center">
                <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item ">
                        <a class="nav-link text-white" href="#AboutUs">Filter</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#contact">Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#open_at">Öffnungszeiten</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#modal">Login</a>
                      </li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>


        <div class="container-fluid bg-danger border-4 border-white rounded mt-2" id="AboutUs">
          <div class="row mt-2 text-justify">
            <div class="col">
              <p> <h2 class="text-center"> 690993 verscheidne Flirtpartner </h2></p>
            </div>
          </div>
          <div class="row text-justify">
            <div class="col-lg-4">
              <p><h4 class="text-center">Wer sind wir?</h4> </p>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg-4">
              <p><h4 class="text-center">Was machen wir?</h4> </p>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg-4">
              <p><h4 class="text-center">Trainingsplan als Bild evtl.?!</h4> </p>
              <p><img src="{{asset('images/Stundenplan.jpg')}}" class="img-fluid" style="padding-left: 39px;height: 264px"></p>
            </div>
          </div>
        </div>
        <div class="container-fluid bg-danger border-4 border-white rounded text-center mt-2" id="contact">
          <div class="row mt-2 text-justify">
            <div class="col">
              <p> <h2 class="text-center"> Kontakt </h2></p>
            </div>
          </div>
          <div class="row mt-2 mb-2">
            <div class="col-lg-4" style="">
                <table class="table table-borderless text-white">
                  <tbody>
                    <tr>
                      <td scope="row">Straße</td>
                      <td scope="row">Husumerstr. 8</td>
                    </tr>
                    <tr>
                      <td scope="row">PlZ/Stadt</td>
                      <td scope="row">24941, Flensburg</td>
                    </tr>
                    <tr>
                      <td scope="row">Social Media</td>
                      <td scope="row"><a class="btn btn-dark btn-outline btn-social-icon btn-instagram" href="https://www.facebook.com/yak.bjj.flensburg"><span class="fa fa-instagram"></span></a>
                      <a class="btn btn-primary btn-social-icon btn-facebook" href="https://www.facebook.com/yak.bjj.flensburg"><span class="fa fa-facebook"></span></a></td>
                    </tr>
                    <tr>
                      <td scope="row">Email</td>
                      <td scope="row"><a href="mailto:teamyak@outlook.com">teamyak@outlook.com</a></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="col-lg-8 mb-2">
              <div class="card">
              <div class="card-body">
                <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
              		<div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                      var setting = {"height":280,"width":890,"zoom":15,"queryString":"Husumer Straße 8, Flensburg, Deutschland","place_id":"EidIdXN1bWVyIFN0cmHDn2UsIEZsZW5zYnVyZywgRGV1dHNjaGxhbmQiLiosChQKEgkpRaiAG2izRxGYy9Hr0l3zRxIUChIJhxZSabFCs0cRhsrU6C0Oil0","satellite":false,"centerCoord":[54.774803892182675,9.433138896619413],"cid":"0x47f35dd2ebd1cb98","lang":"de","cityUrl":"/germany/flensburg-17029","cityAnchorText":"Karte von Flensburg, Ostsee, Deutschland","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"200811"};
                      var d = document;
                      var s = d.createElement('script');
                      s.src = 'https://embedgooglemap.1map.com/js/script-for-user.js?embed_id=200811';
                      s.async = true;
                      s.onload = function (e) {
                        window.OneMap.initMap(setting)
                      };
                      var to = d.getElementsByTagName('script')[0];
                      to.parentNode.insertBefore(s, to);
                    })();</script><a href="https://embedgooglemap.1map.com/de">1 Map</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid bg-danger border-4 border-white rounded text-center mt-2" id="open_at">
        <div class="row d-flex justify-content-center">
          <div class="col-12">
            <h4 class="text-center">Trainingszeiten</h4>
          </div>
          <hr>
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th scope="row">Montag</th>
                    <th scope="row">18.00 - 19.30 Uhr</th>
                  </tr>
                  <tr>
                    <th scope="row">Dienstag</th>
                    <th scope="row">18.00 - 19.30 Uhr</th>
                  </tr>
                  <tr>
                    <th scope="row">Mittwoch</th>
                    <th scope="row">18.00 - 19.30 Uhr</th>
                  </tr>
                  <tr>
                    <th scope="row">Donnerstag</th>
                    <th scope="row">18.00 - 19.30 Uhr</th>
                  </tr>
                  <tr>
                    <th scope="row">Freitag</th>
                    <th scope="row">18.00 - 19.30 Uhr</th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
