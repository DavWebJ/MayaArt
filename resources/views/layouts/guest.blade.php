<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <meta name="keywords" content="tissus,design,maya art,art,peinture,dessin,vetement,commerce,boutique,shop">
         <meta name="description"content="@yield('meta')">
        <meta name="author" content="Ludmilla Quesnot">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        {{--  <meta name="author" content="David Friquet">
        <meta name="twitter:site" content="@david_friquet">
        <meta name="twitter:title" content="david-friquet développeur Web/Unity freelance">
        <meta name="twitter:description" content="développeur web freelance/développeur Unity.">
        <meta name="twitter:image:src" content="https://twitter.com/david_friquet/photo">  --}}
        <!-- Open Graph meta pour Facebook -->
        {{--  <meta property="og:title" content="David-friquet developpeur web freelance" />
        <meta property="og:url" content="https://www.facebook.com/davidfriquet27/" />
        <meta property="og:image" content="https://www.facebook.com/610335496111481/photos/678034209341609/" />
        <meta property="og:description" content="développeur web freelance/développeur Unity." />
        <meta property="og:site_name" content="davidfriquet27" />  --}}
        <title>@yield('title')</title>

        <link rel="alternate" href="rss.xml" type="application/rss+xml" title="RSS">
        <!-- styles  -->
        <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'/>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'/>
        <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        
        <!-- Scripts -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>

        
        @yield('extra-script')
        <script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'></script>
        
        <script src="{{ asset('js/app.js') }}"></script>
        @livewireScripts

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/coookie.css') }}" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="overflow-x-hidden goto-here">
     <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ route('home') }}">MayArt</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	          <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">Qui-suis-je</a></li>
            <li class="nav-item"><a href="{{ route('shop') }}" class="nav-link">Boutique</a></li>
	          <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            @auth
             	<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                @if (auth()->user()->role_id == 2)
                <a href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Dashboard') }}
                </a>
                        @elseif(auth()->user()->role_id == 1)
                <a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </a>
                @endif
                <div class="border-t border-gray-100"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('Logout') }}
                </a>
                </form>
              </div> 
            @endauth
            @guest
                <li class="nav-item cta cta-colored"><a href="{{ route('login') }}" class="nav-link"><span class="fa fa-user"></span></a></li>
            @endguest
	          <li class="nav-item cta cta-colored"><a href="{{route('customer.cart')}}" class="nav-link"><span class="icon-shopping_cart"></span>[{{ Cart::count()}}]</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
        {{ $slot ?? '' }}

        @yield('login')
        @yield('register')
        @include('includes.errors')
        @stack('modals')
  
    <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">MayArt</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('shop') }}" class="py-2 d-block">Boutique</a></li>
                <li><a href="{{ route('about') }}" class="py-2 d-block">Qui-suis-je</a></li>
                <li><a href="{{ route('contact') }}" class="py-2 d-block">Contactez-moi</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="{{ route('cgv') }}" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="{{ route('contact') }}" class="py-2 d-block">retour et échanges</a></li>
	                <li><a href="{{ route('mentions') }}" class="py-2 d-block">Mentions légales</a></li>
	                <li><a href="{{ route('cgv') }}" class="py-2 d-block">CGV</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy; {{ \Carbon\Carbon::now()->parse()->year }} All rights reserved MayArt | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
      <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
      <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
      <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
      <script src="{{ asset('js/aos.js') }}"></script>
      <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
      <script src="{{ asset('js/scrollax.min.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/Init.js') }}"></script>
         <script>
             $(function () {
                 const InitClass = new Init();
             });
         </script>
    </body>
</html>
