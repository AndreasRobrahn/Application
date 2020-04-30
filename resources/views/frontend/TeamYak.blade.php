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
    </head>
    <body class="bg-white text-dark">
      <div class="container-fluid p-0 text-white">
        <nav class="navbar fixed-bottom navbar-light bg-danger">
            <a class="navbar-brand " href="#">
              <img src="{{asset('images/teamyak_logo.jpg')}}" alt="hier sollte das Teamlogo sein" class="d-inline-block align-top" style="max-width: 10vh">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#AboutUs"><b>Team Yak</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Kontakt</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#timeline">Öffnungszeiten</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Login</a>
              </li>
            </ul>
          </div>
        </nav>
          <div id="carouselExampleIndicators" class="carousel slide border border-white" data-ride="carousel">

            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/bjj_vejen_teamfoto Kopie.jpeg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="top :5%">
                  <h2 class="font-weight-bold text-warning">
                  <p>Wille...</p></h2>
                </div>
            </div>
            <div class="carousel-item">
              <img src="{{asset('images/bjj07_01 Kopie.jpeg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block text-warning" style="top :5%">
                <h2 class="font-weight-bold text-warning">
                <p>Disziplin...</p></h2>
              </div>
            </div>
            <div class="carousel-item">
              <div class="carousel-caption d-none d-md-block text-warning" style="top :5%">
                <h2 class="font-weight-bold text-warning">
                <p>blablabla</p></h2>
              </div>
              <img src="{{asset('images/bjj09_01 Kopie.jpeg')}}" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="container-fluid bg-danger border-4 border-white rounded mt-2" id="AboutUs">
          <h2 class="text-center"> Team Yak </h2>
          <div class="row text-center">
            <div class="col-4">
              <p>Wer sind wir?</p>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-4">
              <p>was machen wir?</p>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-4">
              <p>Wer sind wir?</p>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
          </div>
        </div>
        <div class="container-fluid bg-danger border-4 border-white rounded text-center mt-2" id="timeline">
          <h2 > Kontakt </h2>
          <hr>
          <div class="row d-flex justify-content-center">
            <div class="card p-2 m-2">
              <div class="card-body text-dark">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td scope="row">Straße</td>
                      <td scope="row">Husumerstr.</td>
                    </tr>
                    <tr>
                      <td scope="row">PlZ/Stadt</td>
                      <td scope="row">24941, Flensburg</td>
                    </tr>
                    <tr>
                      <td scope="row">Social Media</td>
                      <td scope="row"><a class="btn btn-info btn-social-icon btn-instagram" href="https://www.facebook.com/yak.bjj.flensburg"><span class="fa fa-instagram"></span></a>
                      <a class="btn btn-primary btn-social-icon btn-facebook" href="https://www.facebook.com/yak.bjj.flensburg"><span class="fa fa-facebook"></span></a></td>
                    </tr>
                    <tr>
                      <td scope="row">Telefon</td>
                      <td scope="row"></td>
                    </tr>
                    <tr>
                      <td scope="row">Email</td>
                      <td scope="row"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card p-2 m-2">
            <div class="card-body">
              <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
            		<div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                    var setting = {"height":270,"width":610,"zoom":15,"queryString":"Husumer Straße, Flensburg, Deutschland","place_id":"EidIdXN1bWVyIFN0cmHDn2UsIEZsZW5zYnVyZywgRGV1dHNjaGxhbmQiLiosChQKEgkpRaiAG2izRxGYy9Hr0l3zRxIUChIJhxZSabFCs0cRhsrU6C0Oil0","satellite":false,"centerCoord":[54.774803892182675,9.433138896619413],"cid":"0x47f35dd2ebd1cb98","lang":"de","cityUrl":"/germany/flensburg-17029","cityAnchorText":"Karte von Flensburg, Ostsee, Deutschland","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"200811"};
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
              <div class="container-fluid bg-danger border-4 border-white rounded text-center mt-2" >
                <div class="row d-flex justify-content-center">
                  <div class="col-12">
                    <h4 class="text-center">Trainingszeiten</h4>
                  </div>
                  <hr>
                  <div class="col-12">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">Montag</th>
                          <th scope="col">Dienstag</th>
                          <th scope="col">Mittwoch</th>
                          <th scope="col">Donnerstag</th>
                          <th scope="col">Freitag</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">18.00 - 19.30 Uhr</th>
                          <th scope="row">18.00 - 19.30 Uhr</th>
                          <th scope="row">18.00 - 19.30 Uhr</th>
                          <th scope="row">18.00 - 19.30 Uhr</th>
                          <th scope="row">18.00 - 19.30 Uhr</th>
                        </tr>
                      </tbody>
                    </table>
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
      <div class="container-fluid bg-danger border-4 border-white rounded mb-0" style="height: 13vh">
        <div class="row mb-5">
          <div class="col-2 text-break">
            <h4>Ansprechpartner</h/4>
          </div>
          <div class="col-10">
          </div>
        </div>
    </div>
</body>
</html>
