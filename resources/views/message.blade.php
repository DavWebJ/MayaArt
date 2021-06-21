@extends('layouts.master')
@section('message')
    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Message</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{$message->title}}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
     <!-- Order Tracking Section Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="order-tracking">
                <h4>{{ $message->title }}</h4>
                <p>{{ $message->message }}</p>
                <a class="btn btn-primary" href="{{ route('dashboard') }}">revenir en arriére</a>
            </div>

        </div>

    </div>
    <!-- Order Tracking Section End -->
@endsection