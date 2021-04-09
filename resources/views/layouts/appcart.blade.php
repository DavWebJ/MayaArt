<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="description"content="@yield('meta')">
        <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

        <link rel="alternate" href="rss.xml" type="application/rss+xml" title="RSS">
        <!-- styles  -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/about.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
        <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
        <link href="{{ asset('css/boutique-all.css') }}" rel="stylesheet">
        <link href="{{ asset('css/paiement.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'/>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        
        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/804c3fbc70.js" ></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script> 
        <script src="{{ asset('js/app.js') }}"></script>
        @livewireScripts

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                            <a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-item vert-background text-gray">Boutique</a>
                        @else
                            <a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-boutique nav-item text-gray">Boutique</a>
                        @endif
                        
                        @if ( request()->routeIs('about'))
                            <a href="{{route('about')}}" class="nav-item jaune-background text-gray">Qui suis-je ?</a>
                        @else
                            <a href="{{route('about')}}" class="nav-about nav-item text-gray">Qui suis-je ?</a>
                        @endif

                        <a href="{{route('home')}}" class="text-gray nav-logo-link "><p><img class="nav-logo" src="{{asset('img/logo-noir.svg')}}" alt=""></p></a>
                        
                        @if ( request()->routeIs('blog'))
                            <a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray">Blog</a>
                        @elseif ( request()->routeIs('blog.show'))
                            <a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray">Blog</a>
                        @else
                            <a href="{{route('blog')}}"data-turbolinks-action="replace" class="nav-blog nav-item text-gray">Blog</a>
                        @endif
                        
                        @if ( request()->routeIs('contact'))
                            <a href="{{route('contact')}}" class="nav-item-contact-active jaune-background text-gray">Contact</a>
                        @else
                            <a href="{{route('contact')}}" class="nav-contact nav-item text-gray">Contact</a>
                        @endif
                        </div>
                </div>
                <div class="absolute flex logandcart-container-nav">
                    
                    @livewire('header') 
                    <!-- Profile dropdown -->
                    <div class="relative">
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
                <div id="menuToggle">
                    
                        <div id="test-hide"></div>
                        <input type="checkbox">
                        <span class="up-span"></span>
                        <span class="middle-span"></span>
                        <span class="down-span"></span>
                        <div id="test-hide"></div>
                    
                    <ul id="menu">
                    @if ( request()->routeIs('shop'))
                        <li><a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-item vert-background text-gray ">Boutique</a></li>
                    @else
                        <li><a href="{{route('shop')}}" data-turbolinks-action="replace" class="nav-boutique nav-item text-gray ">Boutique</a></li>
                    @endif
                    
                    @if ( request()->routeIs('about'))
                        <li><a href="{{route('about')}}" class="nav-item jaune-background text-gray ">Qui suis-je ?</a></li>
                    @else
                        <li><a href="{{route('about')}}" class="nav-about nav-item text-gray ">Qui suis-je ?</a></li>
                    @endif

                    @if ( request()->routeIs('blog'))
                        <li><a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray ">Blog</a></li>
                    @elseif ( request()->routeIs('blog.show'))
                        <li><a href="{{route('blog')}}"data-turbolinks-action="replace" class=" nav-item orange-background text-gray ">Blog</a></li>
                    @else
                        <li><a href="{{route('blog')}}"data-turbolinks-action="replace" class="nav-blog nav-item text-gray ">Blog</a></li>
                    @endif
                    
                    @if ( request()->routeIs('contact'))
                        <li><a href="{{route('contact')}}" class="nav-item-contact-active jaune-background text-gray ">Contact</a></li>
                    @else
                        <li><a href="{{route('contact')}}" class="nav-contact nav-item text-gray ">Contact</a></li>
                    @endif
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
                @livewire('header') 
            </div>
            
        </div>
    </nav>

    @else

            
    @endif
            @endif
                {{ $slot ?? '' }}
                @yield('script')
                @yield('success')
                @yield('error')
                @include('includes.errors')
        </div>
        @stack('modals')
    </body>
</html>