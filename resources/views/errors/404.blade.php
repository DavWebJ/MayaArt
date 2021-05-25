@extends('layouts.master')
@section('404')
    <!-- 404 Section Start -->
    <div class="section-404 section" data-bg-image="assets/images/bg/bg-404.jpg">
        <div class="container">
            <div class="content-404">
                <h1 class="title">Oops!</h1>
                <h2 class="sub-title">Page not found!</h2>
                <p>You could either go back or go to homepage</p>
                <div class="buttons">
                    <a class="btn btn-primary btn-outline-hover-dark" href="{{ route('home') }}">Go back</a>
                    <a class="btn btn-dark btn-outline-hover-dark" href="{{ route('home') }}">Homepage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 Section End -->
@endsection
 