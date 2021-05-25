@extends('layouts.master')
@section('title')
    qui suis je ?
@endsection
@section('meta')

@endsection
@section('about')
    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">QUI SUIS JE ?</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Qui-sui je ?</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- About Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row learts-mb-n30">
                <div class="col-lg-4 col-12 align-self-center learts-mb-30">
                    <div class="about-us4">
                        <span class="sub-title">LEARTS STORE</span>
                        <h2 class="title">Aspiration Inspired Happiness</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-12 learts-mb-30">
                    <img src="{{ asset('images/about/about-6.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- About Section Start -->
    <div class="section section-fluid section-padding pt-0">
        <div class="container">
            <div class="row learts-mb-n30">

                <div class="col-lg-6 col-12 text-center learts-mb-30">
                    <img src="{{ asset('images/about/about-7.jpg') }}" alt="">
                </div>

                <div class="col-lg-6 col-12 align-self-center learts-mb-30">
                    <div class="about-us4">
                        <div class="row learts-mb-n30">
                            <div class="col-xl-8 col-12 learts-mb-30">
                                <div class="desc mb-0">
                                    <p>Crafting beautiful stuff with our own hands and the help from useful tools is a wonderful process, where you can enjoy yourself while pulling out some ideas and busy perfecting your work.</p>
                                </div>
                            </div>
                            <div class="col-12 learts-mb-30">
                                <div class="icon-box4 text-left justify-content-start">
                                    <div class="inner">
                                        <div class="content">
                                            <h6 class="title">FREE SHIPPING</h6>
                                            <p>1800 Abbot Kinney Blvd. Unit D & E Venice</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 learts-mb-30">
                                <div class="icon-box4 text-left justify-content-start">
                                    <div class="inner">
                                        <div class="content">
                                            <h6 class="title">PHONE</h6>
                                            <p>Mobile: (+88) – 1990 – 6886 <br> Hotline: 1800 – 1102</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 learts-mb-30">
                                <div class="icon-box4 text-left justify-content-start">
                                    <div class="inner">
                                        <div class="content">
                                            <h6 class="title">EMAIL</h6>
                                            <p>contact@leartsstore.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- About Section End -->

    <!-- Video Banner Section Start -->
    <div class="section">
        <div class="video-banner" data-bg-image="images/banner/video/video-banner-1.jpg">
            <div class="content">
                <h2 class="title">LITTLE <span>SIMPLE</span> THINGS</h2>
                <a href="https://www.youtube.com/watch?v=1jSsy7DtYgc" class="video-popup">
                    <img src="{{ asset('images/icons/button-play.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="mt-4 share row justify-content-center container ml-auto mr-auto">
            <a class="pr-2"  href="{{ Share::currentPage()->facebook()->getRawLinks() }}" target="_blank"><i class="fab fa-facebook-f fa-2x"></i></a>
            <a class="pr-2" href="{{ Share::currentPage()->twitter()->getRawLinks() }}" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
            <a class="pr-2" href="{{ Share::currentPage()->linkedin()->getRawLinks() }}" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a>
            <a class="pr-2" href="#" target="_blank"><i class="fab fa-instagram fa-2x"></i></a> 
            <a class="pr-2" href="{{ Share::currentPage()->pinterest()->getRawLinks() }}" target="_blank"><i class="fab fa-pinterest fa-2x"></i></a>
            <a class="pr-2" href="{{ Share::currentPage()->whatsapp()->getRawLinks() }}" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a>
        </div>
    </div>
    <!-- Video Banner Section End -->

    <!-- Testimonial Section Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="section-title2 row justify-content-center align-items-center">
                <div class="col-md-auto col-12">
                    <!-- Section Title Start -->
                    <h2 class="title title-icon-right mb-2">Des clients satisfais sont des clients heureux <i class="fal fa-smile lila"></i></h2>
                    <!-- Section Title End -->
                </div>
                <div class="col-md-auto col-12 mt-5 mt-md-0">
                    <a href="{{ route('shop') }}" class="btn btn-primary">Visiter ma boutique</a>
                </div>
            </div>
        </div>
    </div>

 <!-- Testimonials Style Two Section Start -->
    <div class="section section-fluid section-padding pt-0">

        <!-- Section Title Start -->
        <div class="section-title2 text-center col">
            <h2 class="title">ce que les clients pensent</h2>
            <p>*Votre commentaire doit être valider afin d'apparître das le carousel</p>
        </div>
        <!-- Section Title End -->
        <div class="container">
            <div class="section-padding" data-bg-image="images/bg/bg-1.jpg">
                <div class="container">
                    <div class="testimonial-slider">
                        @forelse ($rate as $comment)
                        <div class="col">
                            <div class="testimonial2">
                                <p>" {{ $comment->comment }} "</p>
                                <div class="author">
                                    <div class="content">
                                        <h6 class="name">{{ $comment->user->prenom }}</h6>
                                        <span class="title">à laisser un avis sur le produit  <a href="{{ route('shop.show', ['slug'=> $comment->product->slug]) }}">{{ $comment->product->name }}</a></span>
                                           {!! str_repeat('<i class="fas fa-star btn-outline-warning" aria-hidden="true"></i>', $comment->product->calculateRating()) !!}
                                            {!! str_repeat('<i class="far fa-star btn-outline-secondary" aria-hidden="true"></i>', 5- $comment->product->calculateRating()) !!} <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @empty
                  <div class="col">
                    <div class="testimonial2">
                        <p>bientôt ici les avis clients</p>
                        <div class="author">
                            <img src="{{ asset('images/testimonial/testimonial-2.png') }}" alt="">
                            <div class="content">
                                <h6 class="name">May Art</h6>
                                <span class="title">Admin</span>
                            </div>
                        </div>
                    </div>
                </div>
              @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials Style Two Section End -->

    <!-- Instagram Section Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-1 learts-mb-n50">

                <div class="col align-self-center learts-mb-50 order-lg-2">
                    <div class="section-title3 text-center m-0" data-bg-image="images/title/title-3.png">
                        <h2 class="title"><a class="rose-red" href="https://www.instagram.com/mayart.craft/" target="_blank">@Mayart.craft</a></h2>
                        <p class="desc">Suivez moi sur Instagram</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Instagram Section End -->
@endsection