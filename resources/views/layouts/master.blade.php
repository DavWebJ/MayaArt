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

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'/>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'/>
        <!-- Styles -->
    <link rel="stylesheet" href="{{  asset('css/vendor/vendor.min.css') }}">
    <link rel="stylesheet" href="{{  asset('css/plugins/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" />
    <link href="{{ asset('css/coookie.css') }}" rel="stylesheet">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    
    <!-- Scripts -->
    @yield('extra-script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'></script>
    <script src="{{  asset('js/vendor/vendor.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts
    </head>
    <body>
    <script src="{{  asset('js/plugins/plugins.min.js')}}"></script> 
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
   <!-- Header Section Start -->
    <div class="header-section section section-fluid bg-white d-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col-auto">
                    <div class="header-logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('images/logo/MayArt.jpg') }}" alt="Learts Logo" width="250px"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Search Start -->
                <div class="col-auto mr-auto">
                    <nav class="site-main-menu site-main-menu-left menu-height-100 justify-content-center">
                        <ul>
                        <li ><a href="{{ route('home') }}"><span class="menu-text">Home</span></a></li>
                        <li><a href="{{ route('about') }}"><span class="menu-text">Qui suis je</span></a>
                        </li>
                        <li class="has-children"><a href="#"><span class="menu-text">Gallery</span></a>
                            <ul class="sub-menu">
                                <li><a href="portfolio-3-columns.html"><span class="menu-text">Portfolio 3 Columns</span></a></li>
                                <li><a href="portfolio-details.html"><span class="menu-text">Portfolio Details</span></a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('shop') }}"><span class="menu-text">Boutique</span></a>
                        </li>
                        <li><a href="{{ route('contact') }}"><span class="menu-text">Contact</span></a>
                        </li>
                        <!-- if logged -->
                        @auth
                          <li class="has-children"><a href="#"><span class="menu-text">{{ Auth::user()->prenom }}</span></a>
                            <ul class="sub-menu">
                              @if (auth()->user()->role_id == 2)
                              <li><a href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')"><span class="menu-text">dashboard admin</span></a></li>
                              </a>
                                @elseif(auth()->user()->role_id == 1)
                                <li><a href="{{ route('dashboard') }}"  :active="request()->routeIs('dashboard')"><span class="menu-text">mon compte</span></a></li>
                              </a>
                              @endif
                              <li><form method="POST" action="{{ route('logout') }}">
                                      @csrf
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"><span class="menu-text">Déconexion</span></a>
                                    </form></li>
                            </ul>
                        </li>
                        @endauth
                        <!--end if logged -->
                    </ul>
                </nav>
            </div>
            <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        @guest
                        <div class="header-login">
                            <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                        </div>
                        @endguest
                        @auth
                        @endauth
                       @livewire('cart-count-component')
                       @livewire('wish-list-count-component')
                    </div>
            </div>
        <!-- Site Menu Section End -->
        </div>
    </div>
</div>
    <!-- Header Section End -->

    <!-- Header Sticky Section Start -->
    <div class="sticky-header header-menu-center section bg-white d-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('images/logo/MayArt.jpg') }}" alt="Learts Logo" width="250px"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Search Start -->
                <div class="col d-none d-xl-block">
                    <nav class="site-main-menu justify-content-center">
                        <ul>
                            <li><a href="{{ route('home') }}"><span class="menu-text">Home</span></a>
                            </li>
                            <li><a href="{{ route('about') }}"><span class="menu-text">Qui suis je</span></a>
                            <li class="has-children"><a href="#"><span class="menu-text">Gallery</span></a>
                                <ul class="sub-menu">
                                    <li><a href="portfolio-3-columns.html"><span class="menu-text">Portfolio 3 Columns</span></a></li>
                                    <li><a href="portfolio-details.html"><span class="menu-text">Portfolio Details</span></a></li>
                                </ul>
                            </li>
                            <li ><a href="{{ route('shop') }}"><span class="menu-text">Boutique</span></a>
                            </li>
                            <li ><a href="{{ route('contact') }}"><span class="menu-text">Contact</span></a>
                            </li>
                             <!-- if logged -->
                        @auth
                          <li class="has-children"><a href="#"><span class="menu-text">{{ Auth::user()->prenom }}</span></a>
                            <ul class="sub-menu">
                              @if (auth()->user()->role_id == 2)
                              <li><a href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')"><span class="menu-text">dashboard admin</span></a></li>
                              </a>
                                @elseif(auth()->user()->role_id == 1)
                                <li><a href="{{ route('dashboard') }}"  :active="request()->routeIs('dashboard')"><span class="menu-text">mon compte</span></a></li>
                              </a>
                              @endif
                              <li><form method="POST" action="{{ route('logout') }}">
                                      @csrf
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"><span class="menu-text">Déconexion</span></a>
                                    </form></li>
                            </ul>
                        </li>
                        @endauth
                        <!--end if logged -->
                        </ul>
                    </nav>
                </div>
                <!-- Search End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        @guest
                        <div class="header-login">
                            <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                        </div>
                        @endguest
                        @auth
                        @endauth
                           @livewire('cart-count-component')
                           @livewire('wish-list-count-component')
                        <div class="mobile-menu-toggle d-xl-none">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>

    </div>
    <!-- Header Sticky Section End -->
    <!-- Mobile Header Section Start -->
    <div class="mobile-header bg-white section d-xl-none">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('images/logo/MayArt.jpg') }}" alt="Learts Logo" width="250px"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        @guest
                        <div class="header-login d-none d-sm-block">
                            <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                        </div>
                        @endguest
                        @auth
                        @endauth
                        <div class="header-cart">
                           @livewire('cart-count-component')
                            @livewire('wish-list-count-component')
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->

        <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
       @livewire('wishlist-dynamique')
    </div>
    <!-- OffCanvas Wishlist End -->

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        @livewire('cart-dynamique-component')
    </div>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Search Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <div class="inner customScroll">
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="{{ route('home') }}"><span class="menu-text">Home</span></a></li>
                    <li><a href="{{ route('about') }}"><span class="menu-text">Qui suis je</span></a></li>
                    <li><a href="#"><span class="menu-text">Gallery</span></a>
                        <ul class="sub-menu">
                            <li><a href="portfolio-3-columns.html"><span class="menu-text">Portfolio 3 Columns</span></a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('shop') }}"><span class="menu-text">Boutique</span></a></li>
                    <li><a href="{{ route('contact') }}"><span class="menu-text">Contact</span></a></li>
                </ul>
            </div>
            <div class="offcanvas-buttons">
                <div class="header-tools">
                    <div class="header-login">
                        @auth
                        @if (auth()->user()->role_id == 2)
                          <a href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')"><i class="fal fa-user"></i></a>
                            </a>
                            @elseif(auth()->user()->role_id == 1)
                           <a href="{{ route('dashboard') }}"  :active="request()->routeIs('dashboard')"><i class="fal fa-user"></i></a>
                            </a>
                            @endif
                        @endauth
                        @guest
                            <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                        @endguest
                    </div>
                    @livewire('cart-count-component')
                    @livewire('wish-list-count-component')
                </div>
            </div>
            <div class="offcanvas-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- OffCanvas Search End -->

    <div class="offcanvas-overlay"></div>

        {{ $slot ?? '' }}
        @yield('about')
        @yield('home')
        @yield('contact')
        @yield('checkout')
        @yield('shop')
        @yield('shop-filter')
        @yield('success')
        @yield('error')
        @yield('order')
        @yield('mentions')
        @yield('polices')
        @yield('content')
        @yield('script')
        @yield('login')
        @yield('register')
        @include('includes.errors')
        @stack('modals')
        @yield('stripejs')
        @yield('404')
        @yield('500')
    <!-- Subscribe Section Start -->
    <div class="section learts-pt-60 learts-pb-60" data-bg-image="images/newsletter.jpg">
        <div class="container cover">
            <div class="row align-items-center learts-mb-n30">

                <div class="col-lg-5 learts-mb-30">
                    <!-- Section Title Start -->
                    <div class="section-title text-center mb-0">
                        <h3 class="sub-title rose-red">rester au courant</h3>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-7">
                    <form class="mc-form widget-subscibe m-lg-0">
                        <input id="email" name="email" autocomplete="off" type="email" placeholder="votre Email">
                        <button class="btn btn-primary">Souscrire</button>
                    </form>
                    <!-- mailchimp-alerts Start -->
                    <div class="mailchimp-alerts text-centre">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                    </div><!-- mailchimp-alerts end -->
                </div>

            </div>
        </div>
    </div>
    <!-- Subscribe Section End -->
    @include('includes.footer')
        <!-- Modal -->
    <div class="quickViewModal modal fade" id="quickViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="close" data-dismiss="modal">&times;</button>
                <div class="row learts-mb-n30">
                    <!-- Product Images Start -->
                    <div class="col-lg-6 col-12 learts-mb-30">
                        <div class="product-images">
                            <div class="product-gallery-slider-quickview">
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-1.jpg">
                                    <img src="assets/images/product/single/1/product-1.jpg" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-2.jpg">
                                    <img src="assets/images/product/single/1/product-2.jpg" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-3.jpg">
                                    <img src="assets/images/product/single/1/product-3.jpg" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-4.jpg">
                                    <img src="assets/images/product/single/1/product-4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Images End -->
                </div>
            </div>
        </div>
    </div>
  <!-- loader -->
    </body>
</html>
