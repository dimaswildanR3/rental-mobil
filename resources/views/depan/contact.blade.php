<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{App\Setting::where('slug','nama-toko')->get()->first()->description}} | Kontak</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('depan') }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('depan') }}/css/animate.css">
    
    <link rel="stylesheet" href="{{ asset('depan') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('depan') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('depan') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('depan') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('depan') }}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('depan') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('depan') }}/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="{{ asset('depan') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('depan') }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('depan') }}/css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">{{App\Setting::where('slug','nama-toko')->get()->first()->description}}</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="{{route('depan.home')}}" class="nav-link">Beranda</a></li>
	          <li class="nav-item"><a href="{{route('depan.about')}}" class="nav-link">Tentang</a></li>
	          <li class="nav-item"><a href="{{route('depan.services')}}" class="nav-link">Jasa</a></li>
	          <li class="nav-item active"><a href="{{route('depan.contact')}}" class="nav-link">Kontak</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('depan') }}/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Kontak <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Kontak</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-4">
        		<div class="row mb-5">
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-map-o"></span>
			          	</div>
			            <p><span>Alamat:</span>Kartiasa, Sambas, Sambas, Kalimantan Barat</p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-mobile-phone"></span>
			          	</div>
			            <p><span>Telepon:</span> <a href="tel://1234567920">089694527599</a></p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-envelope-o"></span>
			          	</div>
			            <p><span>Email:</span> <a href="mailto:info@yoursite.com">yusril.riandi16@gmail.com</a></p>
			          </div>
		          </div>
		        </div>
          </div>
          <div class="col-md-8 block-9 mb-md-5">
            <form action="#" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-md-12">
        		<div id="map" class="bg-white"></div>
        	</div>
        </div>
      </div>
    </section>
	

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo"></a><span>{{App\Setting::where('slug','nama-toko')->get()->first()->description}}</span></h2>
              <p>{{App\Setting::where('name','Banner')->get()->first()->description}}</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a target="_blank" href="https://twitter.com"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a target="_blank" href="https://facebook.com"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a target="_blank" href="https://instagram.com"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Informasi</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Dukungan Pelanggan</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Punya Pertanyaan?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Kartiasa ,Kec. Sambas, Sambas</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">089694527599</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">yusril.riandi16@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('depan') }}/js/jquery.min.js"></script>
  <script src="{{ asset('depan') }}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ asset('depan') }}/js/popper.min.js"></script>
  <script src="{{ asset('depan') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('depan') }}/js/jquery.easing.1.3.js"></script>
  <script src="{{ asset('depan') }}/js/jquery.waypoints.min.js"></script>
  <script src="{{ asset('depan') }}/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('depan') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('depan') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('depan') }}/js/aos.js"></script>
  <script src="{{ asset('depan') }}/js/jquery.animateNumber.min.js"></script>
  <script src="{{ asset('depan') }}/js/bootstrap-datepicker.js"></script>
  <script src="{{ asset('depan') }}/js/jquery.timepicker.min.js"></script>
  <script src="{{ asset('depan') }}/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('depan') }}/js/google-map.js"></script>
  <script src="{{ asset('depan') }}/js/main.js"></script>
    
  </body>
</html>