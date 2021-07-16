@extends('layouts.master')
@section('404')
    <!-- 404 Section Start -->
    <div class="section-404 section" data-bg-image="images/bg/bg-404.jpg">
        <div class="container">
            <div class="content-404">
                <h1 class="title">404</h1>
                <h2 class="sub-title">Erreur 404 page introuvable</h2>
                <p>La page que vous demandez n' existe pas , vous êtes perdu ? </p>
                <div class="buttons">
                    <a class="btn btn-primary btn-outline-hover-dark" href="{{ route('home') }}">Retourner sur le site</a>
                    <a class="btn btn-dark btn-outline-hover-dark" href="{{ route('shop') }}">Retourner sur la boutique</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 Section End -->
@endsection
 