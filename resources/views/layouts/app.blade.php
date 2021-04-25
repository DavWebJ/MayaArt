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
        <!--<meta http-equiv="refresh" content="0; url="">-->
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
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'/>
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lightslider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
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
        <link rel="preconnect" href="https://fonts.gstatic.com">
        @livewireStyles
    </head>
    <body class="font-sans antialiased overflow-x-hidden">
@if (Route::has('login'))
    @auth
    <nav class="nav-not-log">
        <div class="laptop-menu h-full px-2 sm:px-6 lg:px-8 flex">
                    
                <div class="relative h-full inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <div class=" absolute flex space-x-4 nav-item-content">
                        @if ( request()->routeIs('shop'))
                            <a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-item vert-background text-gray text-xl font-medium">Boutique</a>
                        @else
                            <a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-boutique nav-item text-gray text-xl font-medium">Boutique</a>
                        @endif
                        
                        @if ( request()->routeIs('about'))
                            <a href="{{route('about')}}" class="nav-item jaune-background text-gray text-xl font-medium">Qui suis-je ?</a>
                        @else
                            <a href="{{route('about')}}" class="nav-about nav-item text-gray text-xl font-medium">Qui suis-je ?</a>
                        @endif

                        <a href="{{route('home')}}" class="text-gray nav-logo-link text-xl font-medium "><p><img class="nav-logo" src="{{asset('img/logo-noir.svg')}}" alt=""></p></a>
                        
                        @if ( request()->routeIs('blog'))
                            <a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray text-xl font-medium">Blog</a>
                        @elseif ( request()->routeIs('blog.show'))
                            <a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray text-xl font-medium">Blog</a>
                        @else
                            <a href="{{route('blog')}}"data-turbolinks-action="replace" class="nav-blog nav-item text-gray text-xl font-medium">Blog</a>
                        @endif
                        
                        @if ( request()->routeIs('contact'))
                            <a href="{{route('contact')}}" class="nav-item-contact-active jaune-background text-gray text-xl font-medium">Contact</a>
                        @else
                            <a href="{{route('contact')}}" class="nav-contact nav-item text-gray text-xl font-medium">Contact</a>
                        @endif
                        </div>
                </div>
                <div class="absolute flex logandcart-container-nav">
                    
                    <a href="{{route('customer.cart')}}" class=" text-orange px-3 py-2 text-lg font-medium">
                        <span class=" fas fa-shopping-bag"><i class="text-black" id="carttotal"> ({{ Cart::count()}})</i></span>
                    </a>
                    <!-- Profile dropdown -->
                    <div class=" relative">
                            <div>
                                <button class=" flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                    
                                </button>
                                    <div class="hidden sm:flex sm:items-center ">
                                        <x-jet-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out py-2">
                                                        <div>{{ Auth::user()->name }}</div>
                                                        <div class="ml-1">
                                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <!-- Account Management -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Account') }}
                                                </div>
                                                @if (auth()->user()->role_id == 2)
                                                <x-jet-dropdown-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                                                    {{ __('Dashboard') }}
                                                </x-dropdown-link>
                                                        @elseif(auth()->user()->role_id == 1)
                                                <x-jet-dropdown-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                                    {{ __('Dashboard') }}
                                                </x-jet-dropdown-link>
                                                @endif

                                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                        {{ __('API Tokens') }}
                                                    </x-jet-dropdown-link>
                                                @endif

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Team Management -->
                                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Manage Team') }}
                                                    </div>

                                                    <!-- Team Settings -->
                                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                        {{ __('Team Settings') }}
                                                    </x-jet-dropdown-link>

                                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                            {{ __('Create New Team') }}
                                                        </x-jet-dropdown-link>
                                                    @endcan

                                                    <div class="border-t border-gray-100"></div>

                                                    <!-- Team Switcher -->
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Switch Teams') }}
                                                    </div>

                                                    @foreach (Auth::user()->allTeams() as $team)
                                                        <x-jet-switchable-team :team="$team" />
                                                    @endforeach

                                                    <div class="border-t border-gray-100"></div>
                                                @endif

                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                                        {{ __('Logout') }}
                                                    </x-jet-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-jet-dropdown>
                                    </div>
                            </div>

                        </div>

                    </div>
                </div>
        </div>


        <!-- Mobile menu,  -------------------------------------------- -->
        <div class="mobile-menu">
            <div class="flex relative">
                <div class="nav-logo-link-mobile" >
                        <img class="nav-logo-mobile cursor-pointer" onclick="window.location.href='{{route('home')}}'" src="{{asset('img/logo-noir.svg')}}" alt="">
                </div>
                <div class="flex">
                        <div id="menuToggle">
                            <div id="test-hide"></div>
                            <input type="checkbox">
                            <span class="up-span"></span>
                            <span class="middle-span"></span>
                            <span class="down-span"></span>
                            <div id="test-hide"></div>
                        
                        <ul id="menu">
                        @if ( request()->routeIs('shop'))
                            <li><a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-item vert-background text-gray text-xl font-medium">Boutique</a></li>
                        @else
                            <li><a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-boutique nav-item text-gray text-xl font-medium">Boutique</a></li>
                        @endif
                        
                        @if ( request()->routeIs('about'))
                            <li><a href="{{route('about')}}" class="nav-item jaune-background text-gray text-xl font-medium">Qui suis je ?</a></li>
                        @else
                            <li><a href="{{route('about')}}" class="nav-about nav-item text-gray text-xl font-medium">Qui suis je ?</a></li>
                        @endif

                        @if ( request()->routeIs('blog'))
                            <li><a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray text-xl font-medium">Blog</a></li>
                        @elseif ( request()->routeIs('blog.show'))
                            <li><a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray text-xl font-medium">Blog</a></li>
                        @else
                            <li><a href="{{route('blog')}}"data-turbolinks-action="replace" class="nav-blog nav-item text-gray text-xl font-medium">Blog</a></li>
                        @endif
                        
                        @if ( request()->routeIs('contact'))
                            <li><a href="{{route('contact')}}" class="nav-item-contact-active jaune-background text-gray text-xl font-medium">Contact</a></li>
                        @else
                            <li><a href="{{route('contact')}}" class="nav-contact nav-item text-gray text-xl font-medium">Contact</a></li>
                        @endif
                        <!-- mobile-connecté 1 -->
                            <li>
                                <div>
                                    <button class=" flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                    </button>
                                    <div class=" sm:flex sm:items-center ">
                                        <x-jet-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out py-2">
                                                        <div>{{ Auth::user()->name }}</div>
                                                        <div class="ml-1">
                                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <!-- Account Management -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Account') }}
                                                </div>
                                                @if (auth()->user()->role_id == 2)
                                                <x-jet-dropdown-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                                                    {{ __('Dashboard') }}
                                                </x-dropdown-link>
                                                        @elseif(auth()->user()->role_id == 1)
                                                <x-jet-dropdown-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                                    {{ __('Dashboard') }}
                                                </x-jet-dropdown-link>
                                                @endif

                                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                        {{ __('API Tokens') }}
                                                    </x-jet-dropdown-link>
                                                @endif

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Team Management -->
                                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Manage Team') }}
                                                    </div>

                                                    <!-- Team Settings -->
                                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                        {{ __('Team Settings') }}
                                                    </x-jet-dropdown-link>

                                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                            {{ __('Create New Team') }}
                                                        </x-jet-dropdown-link>
                                                    @endcan

                                                    <div class="border-t border-gray-100"></div>

                                                    <!-- Team Switcher -->
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Switch Teams') }}
                                                    </div>

                                                    @foreach (Auth::user()->allTeams() as $team)
                                                        <x-jet-switchable-team :team="$team" />
                                                    @endforeach

                                                    <div class="border-t border-gray-100"></div>
                                                @endif

                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                                        {{ __('Logout') }}
                                                    </x-jet-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-jet-dropdown>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="cart-header">
                        <div id="test-hide2"></div>
                        <a href="{{route('customer.cart')}}" class=" text-orange px-3 py-2 text-lg font-medium">
                        <span class=" fas fa-shopping-bag"><i class="text-black" id="carttotal"> ({{ Cart::count()}})</i></span>
                    </a>
                    </div>
                </div>
                
            </div>
            
        </div>
    </nav>

        
        @else

        <nav class="nav-not-log">
            <div class=" laptop-menu relative inset-y-0 right-0 flex items-center  sm:static sm:inset-auto h-full">
                    <div class=" absolute flex space-x-4 nav-item-content">
                        @if ( request()->routeIs('shop'))
                            <a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-item vert-background text-gray text-xl font-medium">Boutique</a>
                        @else
                            <a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-boutique nav-item text-gray text-xl font-medium">Boutique</a>
                        @endif
                        
                        @if ( request()->routeIs('about'))
                            <a href="{{route('about')}}" class="nav-item jaune-background text-gray text-xl font-medium">Qui suis-je ?</a>
                        @else
                            <a href="{{route('about')}}" class="nav-about nav-item text-gray text-xl font-medium">Qui suis-je ?</a>
                        @endif

                        <a href="{{route('home')}}" class="text-gray nav-logo-link text-xl font-medium "><p><img class="nav-logo" src="{{asset('img/logo-noir.svg')}}" alt=""></p></a>
                        
                        @if ( request()->routeIs('blog'))
                            <a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray text-xl font-medium">Blog</a>
                        @elseif ( request()->routeIs('blog.show'))
                            <a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray text-xl font-medium">Blog</a>
                        @else
                            <a href="{{route('blog')}}"data-turbolinks-action="replace" class="nav-blog nav-item text-gray text-xl font-medium">Blog</a>
                        @endif
                        
                        @if ( request()->routeIs('contact'))
                            <a href="{{route('contact')}}" class="nav-item-contact-active jaune-background text-gray text-xl font-medium">Contact</a>
                        @else
                            <a href="{{route('contact')}}" class="nav-contact nav-item text-gray text-xl font-medium">Contact</a>
                        @endif
                        
                    </div>
                <!-- Profile dropdown -->
                <div class=" absolute right-9 ">
                        <div class="flex">
                            <a href="{{route('customer.cart')}}" class=" text-orange text-xl font-medium">
                                <span class="fas fa-shopping-bag"><i class="badge badge-light" id="carttotal">({{ Cart::count()}})</i></span>
                            </a>
                            <button class=" flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <a href="{{route('login')}}" class="text-gray text-xl font-medium"><i class="main-color-text text-xl fas fa-user"></i></a>
                            </button>
                        </div>

                    </div>

                </div>

            </div>
            </div>

            <!-- Mobile menu,  -------------------------------------------- -->
            <div class="mobile-menu">
                <div class="flex">
                    <div class="nav-logo-link-mobile" >
                        <img class="nav-logo-mobile cursor-pointer" onclick="window.location.href='{{route('home')}}'" src="{{asset('img/logo-noir.svg')}}" alt="">
                    </div>
                    <div id="menuToggle">
                        <div id="test-hide"></div>
                        <input type="checkbox" id="checkmenu">
                        <span class="up-span"></span>
                        <span class="middle-span"></span>
                        <span class="down-span"></span>
                        <div id="test-hide"></div>
                        <ul id="menu">
                        @if ( request()->routeIs('shop'))
                            <li><a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-item vert-background text-gray text-xl font-medium">Boutique</a></li>
                        @else
                            <li><a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-boutique nav-item text-gray text-xl font-medium">Boutique</a></li>
                        @endif
                        
                        @if ( request()->routeIs('about'))
                            <li><a href="{{route('about')}}" class="nav-item jaune-background text-gray text-xl font-medium">Qui suis-je ?</a></li>
                        @else
                            <li><a href="{{route('about')}}" class="nav-about nav-item text-gray text-xl font-medium">Qui suis-je ?</a></li>
                        @endif

                        @if ( request()->routeIs('blog'))
                            <li><a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray text-xl font-medium">Blog</a></li>
                        @elseif ( request()->routeIs('blog.show'))
                            <li><a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray text-xl font-medium">Blog</a></li>
                        @else
                            <li><a href="{{route('blog')}}"data-turbolinks-action="replace" class="nav-blog nav-item text-gray text-xl font-medium">Blog</a></li>
                        @endif
                        
                        @if ( request()->routeIs('contact'))
                            <li><a href="{{route('contact')}}" class="nav-item-contact-active jaune-background text-gray text-xl font-medium">Contact</a></li>
                        @else
                            <li><a href="{{route('contact')}}" class="nav-contact nav-item text-gray text-xl font-medium">Contact</a></li>
                        @endif
                        <!-- mobile-connecté 2 -->
                        <button class=" justify-center flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                                <span class="sr-only span-user">Open user menu</span>
                                <a href="{{route('login')}}" class="text-gray text-xl font-medium"><i class="main-color-text text-xl fas fa-user"></i></a>
                        </button>
                        </ul>
                    </div>
                    <div class="cart-header">
                        <div id="test-hide2"></div>
                        <a href="{{route('customer.cart')}}" class=" text-orange px-3 py-2 text-lg font-medium">
                        <span class=" fas fa-shopping-bag"><i class="text-black" id="carttotal"> ({{ Cart::count()}})</i></span>
                    </a>
                    </div>
                    
                </div>
           
                    
            </div>

        </nav>                  
    @endif
            @endif
            
                {{ $slot ?? '' }}
                @yield('about')
                @yield('home')
                @yield('contact')
                @yield('checkout')
                @yield('success')
                @yield('error')
                @yield('order')
                @yield('mentions')
                @yield('polices')
                @yield('post_single')
                @yield('blog.category')
                @yield('content')
                @yield('script')
                @yield('shop.category')
                @yield('login')
                @include('includes.errors')
        </div>
        @stack('modals')

       <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="footer_iner">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <div class="footer_menu">
                            <div class="footer_logo">
                                <a href="index.html"><img src="img/logo.png" alt="#"></a>
                            </div>
                            <div class="footer_menu_item">
                                <a href="index.html">Home</a>
                                <a href="about.html">About</a>
                                <a href="product_list.html">Products</a>
                                <a href="#">Pages</a>
                                <a href="blog.html">Blog</a>
                                <a href="contact.html">Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="social_icon">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright_part">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                            <P>Copyright &copy; © {{ \Carbon\Carbon::now()->parse()->year }} All rights reserved <i class="ti-heart" aria-hidden="true"></i> by <a href="#" target="_blank">someone</a></P>
                            <div class="copyright_link">
                            <p class="mention-legale"><a href="{{ route('mentions') }}">Mentions Légales</a> </p>
                            <p><a href="">CGV</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->
        @yield('stripejs')
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js' ></script>
        <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js' ></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>