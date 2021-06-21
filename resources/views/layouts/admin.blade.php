
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>admin</title>
    <!-- Font Awesome Icons -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css'/>
    <!-- Theme style -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css'/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
    <!-- Google Font: Source Sans Pro -->
    @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ mix('dashmix/css/dashmix.css') }}">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
    @livewireStyles
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    <style>
        #toast-container > div {
            position: relative;
            overflow: hidden;
            margin: 0 0 6px;
            padding: 15px 15px 15px 50px;
            width: 350px;
            -moz-border-radius: 3px 3px 3px 3px;
            -webkit-border-radius: 3px 3px 3px 3px;
            border-radius: 3px 3px 3px 3px;
            background-position: 15px center;
            background-repeat: no-repeat;
            -moz-box-shadow: 0 0 12px #999999;
            -webkit-box-shadow: 0 0 12px #999999;
            box-shadow: 0 0 12px #999999;
            color: #ffffff;
            opacity: 1;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
            filter: alpha(opacity=100);
    }
        .toast {
        background-color: #b57fe7 !important;
        }
        .toast-success {
        background-color: #51a351 !important;
        }
        .toast-error {
        background-color: #bd362f !important;
        }
        .toast-info {
        background-color: #2f96b4 !important;
        }
        .toast-warning {
        background-color: #f89406 !important;
        }
    </style>
</head>
<body>
  <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header - Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="content-header bg-body-light justify-content-center text-danger" data-toggle="layout" data-action="side_overlay_close" href="javascript:void(0)">
                    <i class="fa fa-2x fa-times-circle"></i>
                </a>
                <!-- END Side Header - Close Side Overlay -->

                <!-- Side Content -->
                    <div class="content-side">
                        <div class="block pull-x">
                            <!-- Personal -->
                            <div class="block-content block-content-sm block-content-full bg-body-dark">
                                <span class="text-uppercase font-size-sm font-w700">Identité</span>
                            </div>

                            <!-- END Submit -->
                        </div>
                    </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->

            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header (mini Sidebar mode) -->
                <div class="smini-visible-block">
                    <div class="content-header">
                        <!-- Logo -->
                        <a class="font-w600 text-white tracking-wide" href="{{ route('admin.dashboard') }}">
                            D<span class="opacity-75">x</span>
                        </a>
                        <!-- END Logo -->
                    </div>
                </div>
                <!-- END Side Header (mini Sidebar mode) -->

                <!-- Side Header (normal Sidebar mode) -->
                <div class="smini-hidden">
                    <div class="content-header justify-content-lg-center">
                        <!-- Logo -->
                        <a class="font-w600 text-white tracking-wide" href="{{ route('admin.dashboard') }}">
                           {{ Auth::user()->name }}
                        </a>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div class="d-lg-none">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header (normal Sidebar mode) -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side Actions -->
                    <div class="content-side content-side-full bg-black-10 text-center">
                        <div class="smini-hide">
                            {{--  <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-user-circle"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-file-alt"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-envelope"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-cog"></i>
                            </button>  --}}
                        </div>
                    </div>
                    <!-- END Side Actions -->

                    <!-- Side Navigation -->
                    <div class="content-side">
                        <ul class="nav-main">
                            <li class="nav-main-heading">Gestion de la boutique</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-shopping-cart text-xsmooth"></i>
                                    <span class="nav-main-link-name">Produits</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('product.create') }}">
                                            <i class="nav-main-link-icon fa fa-plus"></i>
                                            <span class="nav-main-link-name">Nouveau</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('product.index') }}">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Gérer les produits</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                             <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-cog text-xsmooth"></i>
                                    <span class="nav-main-link-name">Options produits</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('option.create') }}">
                                            <i class="nav-main-link-icon fa fa-plus"></i>
                                            <span class="nav-main-link-name">Nouveau</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('option.index') }}">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Gérer les options</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-tag text-xsmooth"></i>
                                    <span class="nav-main-link-name">Catégories produits</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('category.create') }}">
                                            <i class="nav-main-link-icon fa fa-plus"></i>
                                            <span class="nav-main-link-name">Nouveau</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('category.index') }}">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Gérer les catégorie</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                           <li class="nav-main-heading">Promotion produit</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-bullhorn text-xsmooth"></i>
                                    <span class="nav-main-link-name">Promotions</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('promotion.create') }}">
                                            <i class="nav-main-link-icon fa fa-plus"></i>
                                            <span class="nav-main-link-name">Créer une nouvelle promos</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('promotion.index') }}">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Gérer les promotions</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-percentage text-xsmooth"></i>
                                    <span class="nav-main-link-name">Coupons</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('coupon.create') }}">
                                            <i class="nav-main-link-icon fa fa-plus"></i>
                                            <span class="nav-main-link-name">Créer un nouveau coupon</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('coupon.index') }}">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Gérer les coupons</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-heading">Gestion des commandes</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-shipping-fast text-xsmooth"></i>
                                    <span class="nav-main-link-name">Commandes</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('order.index') }}">
                                            <i class="nav-main-link-icon fa fa-eye"></i>
                                            <span class="nav-main-link-name">Voir les commandes</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                             <li class="nav-main-heading">Gestion du site</li>

                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-sort-numeric-down text-xsmooth"></i>
                                    <span class="nav-main-link-name">Compteur</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('counter.index') }}">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Gérer le  compteur</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-sort-numeric-down text-xsmooth"></i>
                                    <span class="nav-main-link-name">Header du site</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('header.index') }}">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Gérer les headers</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-main-heading">Configurations<span class="fa fa-cog px-2 text-info-light"></span></li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('home') }}" target="_blank">
                                    <i class="nav-main-link-icon fa fa-house-user text-xsmooth"></i>
                                    <span class="nav-main-link-name">voir le site web</span>
                                    
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header bg-gd-sublime">
                <!-- Header Content -->
                <div class="content-header bg-gd-sublime">
                    <!-- Left Section -->
                    <div>
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                     
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-fw fa-user-circle"></i>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
                                    <div class="pt-2">
                                        <a class="text-white font-w600" href="{{ route('admin.dashboard') }}">{{ Auth::user()->name }} {{ Auth::user()->prenom }}</a>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item" href="{{ route('admin.list') }}">
                                        <i class="far fa-fw fa-user mr-1"></i> Admin gestion
                                    </a>
                                    <!-- END Side Overlay -->
                                    <div role="separator" class="dropdown-divider"></div>
                                     <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <i class="nav-icon fas fa-sign-out-alt px-2"></i>{{ __('Logout') }}
                                        </a>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="fa fa-fw fa-cog text-xsmooth animated animate-spin"></i>
                        </button>
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                {{--  <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-sidebar-dark">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-dark" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search Application.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->  --}}

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary-darker">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
        @if(Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
        @endif
        @if(Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
        @endif
                <!-- Quick Menu -->
                <div class="bg-body-dark">
                    <div class="content">
                        <div class="row gutters-tiny push invisible" data-toggle="appear">
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo15.jpg');" href="{{ route('admin.dashboard') }}">
                                    <div class="block-content block-content-full bg-gd-fruit-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-home text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Tableau de bord</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo16.jpg');" href="{{route('promotion.index')}}">
                                    <div class="block-content block-content-full bg-gd-sublime-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-bullhorn text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Mes promotions</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo18.jpg');" href="{{route('product.index')}}">
                                    <div class="block-content block-content-full bg-gd-sea-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-shopping-cart text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Ma boutique</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo19.jpg');" href="{{ route('order.index') }}">
                                    <div class="block-content block-content-full bg-gd-dusk-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-shipping-fast text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Mes commandes</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo17.jpg');" href="{{ route('rating.index') }}">
                                    <div class="block-content block-content-full bg-gd-aqua-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-comments text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Les avis clients</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo20.jpg');"href="{{ route('logout') }}"onclick="event.preventDefault();this.closest('form').submit();">
                                    <div class="block-content block-content-full bg-gd-sun-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-sign-out-alt text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Déconnexion</div>
                                        </div>
                                    </div>
                                </a>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- END Quick Menu -->
        {{ $slot ?? '' }}
        @yield('admin.dashboard')
        @yield('admin.index')
        @yield('admin.create')
        @yield('admin.promotion')
        @yield('admin.promotion.create')
        @yield('admin.promotion.edit')
        @yield('admin.header')
        @yield('admin.header.create')
        @yield('admin.header.edit')
        @yield('admin.post')
        @yield('admin.post.create')
        @yield('admin.post.edit')
        @yield('admin.category')
        @yield('admin.category.create')
        @yield('admin.category.edit')
        @yield('admin.postcategory')
        @yield('admin.postcategory.create')
        @yield('admin.postcategory.edit')
        @yield('admin.product')
        @yield('admin.product.create')
        @yield('admin.product.edit')
        @yield('admin.option')
        @yield('admin.option.create')
        @yield('admin.option.edit')
        @yield('admin.order')
        @yield('admin.order.show')
        @yield('admin.user')
        @yield('admin.rating')
        @yield('admin.coupon')
        @yield('admin.coupon.create')
        @yield('admin.coupon.edit')
        @yield('admin.newsletter')
        @yield('admin.imageproduct')
        @yield('admin.imageproduct.create')
        @yield('admin.imageproduct.edit')
        @yield('admin.counter.edit')
        @yield('admin.counter')
                </div>
            <!-- Footer -->
            <footer id="page-footer" class="bg-white">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="https://1.envato.market/r6y" target="_blank">Dashmix 3.2</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- Dashmix Core JS -->
         <script src="{{ asset('admin/js/js.cookie.min.js') }}"></script> 
         <script src="{{ asset('admin/js/jquery-scrollLock.min.js') }}"></script> 
         <script src="{{ asset('admin/js/jquery.appear.min.js') }}"></script> 
         <script src="{{ asset('admin/js/simplebar.min.js') }}"></script> 
         <script src="{{ asset('admin/js/jquery.sparkline.min.js') }}"></script> 
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script> 
        <script src="{{ asset('dashmix/js/dashmix.app.js') }}"></script>
        <script src="{{ asset('dashmix/js/laravel.app.js') }}"></script> 

<!-- REQUIRED SCRIPTS -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.9.1/bootstrap-maxlength.min.js' ></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stack('modals')

    @livewireScripts
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        
        $(function () {
            $('.js-maxlength').maxlength({
                alwaysShow: true,
                warningClass: "badge badge-warning",
                limitReachedClass: "badge badge-danger",
                placement: 'bottom',
            });
            toastr.options.progressBar = true;
            Dashmix.helpers('sparkline');
            $('.js-example-basic-single').select2();
            window.scrollTo(0, 0);
            tinymce.init({
                selector : ".tiny",
                plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
                toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            bsCustomFileInput.init();
            
    });
    </script>
</body>
</html>
