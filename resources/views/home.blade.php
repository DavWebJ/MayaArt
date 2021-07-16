@extends('layouts.master')
@section('title')
  La boutique de MayArt
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
                        <img src="{{ asset('images/slide gauche.png') }}" alt="Slide Icon">
                        <img src="{{ asset('images/slide droit.png') }}" alt="Slide Icon">
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
                            <h4 class="title">échange</h4>
                            <p>échanger vos produits pendant 30 jours</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 learts-mb-30">
                    <div class="icon-box5">
                        <div class="icon"><i class="fas fa-headset"></i></div>
                        <div class="content">
                            <h4 class="title">contactez moi</h4>
                            <p>Service après vente 7/7 jours</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 learts-mb-30">
                    <div class="icon-box5">
                        <div class="icon"><i class="fas fa-gift"></i></div>
                        <div class="content">
                            <h4 class="title">Code promos</h4>
                            <p>Chaque mois des nouvelles promotions</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Feature Section End -->

    <!-- Product/Sale Banner Group Two Section Start -->
    <div class="section section-padding pt-0 mt-4">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h1 class="title">La boutique de MayArt</h1>
                <p>Browse a wide range of distinctive pieces of arts you could never find elsewhere.</p>
            </div>
            <!-- Section Title End -->
            <div class="row learts-mb-n30">

                <div class="col-lg-6 learts-mb-30">
                    <div class="sale-banner4">
                        <div class="inner">
                            <img src="{{ asset('images/ecolo.jpg')}}" alt="matthew smith Rfflri94rs8 by unsplash">
                            <div class="content">
                                <h3 class="sub-title orchid"></h3>
                                <h2 class="title lila"></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 learts-mb-30">
                    <div class="row learts-mb-n30">

                        <div class="col-12 learts-mb-30">
                            <div class="learts-blockquote bg-yellow">
                                <div class="inner">
                                    <img src="{{asset('images/banner/sale/sale-banner6-1.jpg')}}" alt="Sale Banner Image">
                                    <div class="content">
                                         <h3 class="title orchid">Bienvenue dans mon univers</h3>
                                         <span class="sub-title orchid">petite decription</span>
                                        <a class="link rose-red" href="{{ route('about') }}">Qui sui-je?</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 learts-mb-30">
                            <div class="sale-banner6">
                                <div class="inner">
                                    <img src="{{ asset('images/instagram_kawaii.jpg')}}" alt="Sale Banner Image">
                                    <div class="content">
                                        <a href="https://www.instagram.com/mayart.craft/" class="link rose-red" style="margin-left: 120px;"> <i class="fab fa-instagram mr-4 fa-3x"></i>@MayArt.craft</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Product/Sale Banner Group Two Section End -->

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
                            <img src="{{ asset($promos->banner) }}" alt="{{ $promos->alt }}">
                            <div class="content">
                                <h3 class="title white-text" >{{ $promos->product->name }}</h3>
                                {{--  <img class="price " src="{{ asset($promos_2->banner) }}" alt="{{ $promos_2->alt }}">  --}}
                            </div>
                        </div>
                    </div>
                    <div class="countdown2 primary2 justify-content-center learts-mt-50" data-countdown="{{ $promos->end }}">
                        
                    </div>
                    <div class="d-flex justify-content-center product-info">   
                        <span class="price">
                            @if ($promos->product->price_promos ?? '')
                                <span class="old">{{$promos->product->price}} €</span>
                                <span class="new">{{$promos->product->FormatPrice()}}</span>
                            @else
                                {{$promos->product->FormatPrice()}}
                            @endif
                        </span>
                    </div>
                    <div class="d-flex justify-content-center learts-mt-50">
                        <a href="{{ route('shop.show',['slug' => $promos->product->slug]) }}" class="btn btn-primary">je veux ce produit</a>
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
                        <img src="{{ asset($promos_2->banner) }}" alt="{{ $promos_2->alt }}">
                    </div>
                </div>

                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="product-deal-content">
                        <h2 class="title">{{ $promos_2->product->name }}</h2>
                        <div class="desc">
                            <p>{!! $promos_2->desc !!}</p>
                            <div class="product-info d-flex justify-content-center my-4">   
                                <span class="price orchid" style="font-weight: bold !important">
                                    @if ($promos_2->product->price_promos ?? '')
                                        <span class="old">{{$promos_2->product->price}} €</span>
                                        <span class="new">{{$promos_2->product->FormatPrice()}}</span>
                                    @else
                                        {{$promos_2->product->FormatPrice()}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="countdown1" data-countdown="{{ $promos_2->end }}"></div>
                        <a href="{{ route('shop.show',['slug' => $promos_2->product->slug]) }}" class="btn btn-primary">Acheter maintenant</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Deal of the Day Section End -->
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
{{--  @include('includes.counterup')  --}}
   
@endsection        


