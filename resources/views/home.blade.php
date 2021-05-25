@extends('layouts.master')
@section('title')
  Le monde de MayArt
@endsection
@section('meta')
 Le monde de MayArt
@endsection
@section('home')
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
    <div class="home1-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="home1-slide-item swiper-slide" data-swiper-autoplay="5000"  style="background-image: url({{ $header->banner }})">
                <div class="home1-slide1-content">
                    <span class="bg"></span>
                    <span class="slide-border"></span>
                    <span class="icon"><img src="{{asset('images/bobine.png')}}" alt="Slide Icon"></span>
                    <h2 class="title text-center">{{ $header->title }}</h2>
                    <h3 class="sub-title">{{ $header->subtitle }}</h3>
                    <div class="link"><a class="rose-red" href="{{ route('shop') }}">Visiter la boutique</a></div>
                </div>
            </div>
            <div class="home1-slide-item swiper-slide" data-swiper-autoplay="5000" style="background-image: url({{ $header_2->banner }})">
                <div class="home1-slide2-content">
                    <span class="bg" data-bg-image="images/slider/home1/slide-2-1.png"></span>
                    <span class="slide-border"></span>
                    <span class="icon">
                        <img src="{{ asset('images/slider/home1/slide-2-2.png') }}" alt="Slide Icon">
                        <img src="{{ asset('images/slider/home1/slide-2-3.png') }}" alt="Slide Icon">
                    </span>
                    <h2 class="title text-center">{{ $header_2->title }}</h2>
                    <h3 class="sub-title">{{ $header_2->subtitle }}</h3>
                    <div class="link"><a class="rose-red" href="{{ route('shop') }}">Visiter la boutique</a></div>
                </div>
            </div>
           <div class="home1-slide-item swiper-slide" data-swiper-autoplay="5000"  style="background-image: url({{ $header_3->banner }})">
                <div class="home1-slide1-content">
                    <span class="bg"></span>
                    <span class="slide-border"></span>
                    <span class="icon"><img src="{{asset('images/bobine.png')}}" alt="Slide Icon"></span>
                    <h2 class="title text-center">{{ $header_3->title }}</h2>
                    <h3 class="sub-title">{{ $header_3->subtitle }}</h3>
                    <div class="link"><a class="rose-red" href="{{ route('shop') }}">Visiter la boutique</a></div>
                </div>
            </div>
        </div>
        <div class="home1-slider-prev swiper-button-prev"><i class="ti-angle-left"></i></div>
        <div class="home1-slider-next swiper-button-next"><i class="ti-angle-right"></i></div>
    </div>
    <!-- Slider main container End -->
    
<!-- Product/Sale Banner Group One Section Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                @php
                         \Carbon\Carbon::setLocale('FR');
                @endphp
                <h1 class="title my-4">Bienvenue sur mon site</h1> <br>
                <h2 class="title">Mon produit star <i class="fa fa-star  btn-outline-warning mx-1"></i> du mois de {{  Carbon\Carbon::now()->translatedFormat('M')}}</h2>
                <p>Chaque mois je créer un nouveau produit unique que je mettrais en vente dans ma <a class="rose-red" href="{{ route('shop') }}">boutique</a> . </p>
            </div>
            <!-- Section Title End -->
            <div class="row learts-mb-n40 justify-center align-self-center">

                <div class="col-lg-5 col-12 ml-auto align-self-center learts-mb-30">
                    <div class="about-us">
                        <div class="inner">
                            <img class="logo " src="{{asset('images/logo/logo-3.png')}}" alt="Site Logo">
                            <h2 class="title">Making & crafting</h2>
                            <span class="special-title">Handicraft shop</span>
                            <p>Crafting beautiful stuff with our own hands and the help from useful tools is a wonderful process, where you can enjoy yourself while pulling out some ideas and busy perfecting your work.</p>
                            <a href="{{ route('shop') }}" class="link rose-red">Voir la boutique</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 learts-mb-40">
                    <div class="sale-banner2">
                        <div class="inner">
                            <div class="image"><img src="{{ asset($promos->banner) }}" alt="{{ $promos->alt }}"></div>
                            <div class="content row justify-content-between mb-n3">
                                <div class="col-auto mb-3">
                                    <h2 class="sale-percent">{{ $promos->product->name }}</h2>
                                    <span class="text">{!! $promos->desc !!}</span>
                                </div>
                                <div class="col-auto mb-3">
                                    <a class="btn btn-primary" href="{{ route('shop.show',['slug' => $promos->product->slug ]) }}">Acheter ce produit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Product/Sale Banner Group One Section End -->

    <!-- Category Banner Section Start -->
    <div class="section section-fluid learts-pt-30 bg-white">
        <div class="container">
            <div class="row learts-mb-n30">

                <div class="col-xxl-6 col-xl-8 col-12 learts-mb-30">
                    <div class="learts-blockquote bg-yellow">
                        <div class="inner">
                            <h2 class="title">Learts is an online shop for handicrafts and arts’ works based in the US.</h2>
                            <div class="desc">
                                <p>Crafting beautiful stuff with our own hands and the help from useful tools is a wonderful process, where you can enjoy yourself while pulling out some ideas and busy perfecting your work. We provide high-end unique vases, wall arts, home accessories, and furniture pieces.</p>
                            </div>
                            <a href="{{ route('about') }}" class="link rose-red">Qui suis-je ?</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-8 col-md-6 col-12 order-xxl-6 learts-mb-30">
                    <div class="instagram-banner1">
                        <div class="inner">
                            <div class="image"><img src="{{ asset('images/banner/instagram-1.jpg')}}" alt=""></div>
                            <div class="content">
                                <div class="icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <span class="sub-title">suivez-moi sur instagram</span>
                                <h3 class="title"><a class="rose-red" href="https://www.instagram.com/mayart.craft/" target="_blank">@Mayart.craft</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category Banner Section End -->
         <!-- Shop By Category Section Start -->
    <div class="section section-fluid section-padding bg-white">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h2 class="title title-icon-both">toutes les catégories</h2>
            </div>
            <!-- Section Title End -->
            <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 learts-mb-n40">
                @foreach ($category as $cat)
                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="{{route('shop.category',['category_slug'=>$cat->slug])}}" class="inner rose-red">
                            <div class="image"><img src="{{ asset($cat->image) }}" alt=""></div>
                            <div class="content">
                                <h3 class="title" style="color: {{ $cat->color }}">{{ $cat->slug }}</h3>
                                <span class="number">{{ $cat->products->count() }} produits</span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Shop By Category Section End -->
        <!-- Banner Section Start -->
    <div class="home12-slide-item section swiper-slide-active mt-4" data-bg-image="images/test/promos2.jpg">
        <div class="home12-slide1-content">
            <div class="bg"></div>
            <span class="sub-title rose-red">livraison offerte</span>
            <h2 class="title">à partir de 35  €</h2>
        </div>
    </div>
    <!-- Banner Section End -->

     
    <!-- Product Section Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title title-icon-both">Mes dernières créations</h2>
                <p>Browse a wide range of distinctive pieces of arts you could never find elsewhere.</p>
            </div>
            <!-- Section Title End -->

            <div class="row learts-mb-n30">
                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="sale-banner11">
                        <div class="inner">
                            <img src="{{ asset($promos_2->banner) }}" alt="{{ $promos_2->alt }}">
                            <div class="content">
                                <h3 class="title white-text" >{{ $promos_2->product->name }}</h3>
                                {{--  <img class="price " src="{{ asset($promos_2->banner) }}" alt="{{ $promos_2->alt }}">  --}}
                            </div>
                        </div>
                    </div>
                    <div class="countdown2 primary2 justify-content-center learts-mt-50" data-countdown="{{ $promos_2->end }}"></div>
                    <div class="d-flex justify-content-center learts-mt-50">
                        <a href="{{ route('shop.show',['slug' => $promos_2->product->slug]) }}" class="btn btn-primary">je veux ce produit</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 learts-mb-30">
                    <!-- Products Start -->
                        @livewire('home-wishlist-component')
                    <!-- Products End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Product Section End -->

       <!-- Deal of the Day Section Start -->
    <div class="section section-fluid section-padding">
        <div class="container">
            <div class="row align-items-center learts-mb-n30">

                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="product-deal-image text-center">
                        <img src="{{ asset($promos_3->banner) }}" alt="{{ $promos_3->alt }}">
                    </div>
                </div>

                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="product-deal-content">
                        <h2 class="title">{{ $promos_3->product->name }}</h2>
                        <div class="desc">
                            <p>{!! $promos_3->desc !!}</p>
                        </div>
                        <div class="countdown1" data-countdown="{{ $promos_2->end }}"></div>
                        <a href="{{ route('shop.show',['slug' => $promos_3->product->slug]) }}" class="btn btn-primary">Acheter maintenant</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Deal of the Day Section End -->
     <!-- Feature Section Start -->
    <div class="section learts-pt-30 learts-pb-30 bg-yellow">
        <div class="container">
            <div class="row learts-mb-n30">

                <div class="col-lg-3 col-sm-6 col-12 learts-mb-30">
                    <div class="icon-box5">
                        <div class="icon"><i class="fas fa-truck"></i></div>
                        <div class="content">
                            <h4 class="title">Livraison offerte</h4>
                            <p>à partir de 35 €</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 learts-mb-30">
                    <div class="icon-box5">
                        <div class="icon"><i class="fas fa-redo-alt"></i></div>
                        <div class="content">
                            <h4 class="title">Free returns</h4>
                            <p>Free 7-day returns</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 learts-mb-30">
                    <div class="icon-box5">
                        <div class="icon"><i class="fas fa-headset"></i></div>
                        <div class="content">
                            <h4 class="title">24/7 Support</h4>
                            <p>Dedicated support</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 learts-mb-30">
                    <div class="icon-box5">
                        <div class="icon"><i class="fas fa-gift"></i></div>
                        <div class="content">
                            <h4 class="title">Gift cards</h4>
                            <p>Code promotion</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Feature Section End -->
{{--  @include('includes.counterup')  --}}
   
@endsection        


