@extends('layouts.master')
@section('login')


<!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1 class="title">Page de connexion</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="breadcrumb-item active">Connexion</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Login & Register Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="user-login-register bg-light">
                        <div class="login-register-title">
                            <h2 class="title">Login</h2>
                            <p class="desc">Content de vous revoir !</p>
                        </div>
                        <div class="login-register-form">
                            <form method="POST"  id="form-login" action="{{ route('login') }}"  novalidate="novalidate">
                                @csrf
                                @include('includes.errors')
                                <div class="row learts-mb-n50">
                                    <div class="col-12 learts-mb-50">
                                        <input type="email" id="email" name="email" :value="old('email')" required autofocus
                                        placeholder="Votre adresse email">
                                    </div>
                                    <div class="col-12 learts-mb-50">
                                    <input   type="password" name="password" required autocomplete="current-password"
                                        placeholder="Mot de passe">
                                    <div class="col-12 text-center learts-mb-50 mt-4">
                                        <button class="btn btn-dark btn-outline-hover-dark" type="submit">se connecter</button>
                                    </div>
                                    <div class="col-12 learts-mb-50">
                                        <div class="row learts-mb-n20">
                                            <div class="col-12 learts-mb-20">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                                                    <label class="form-check-label" for="rememberMe">Se souvenir de moi ?</label>
                                                </div>
                                            </div>
                                            <div class="col-12 learts-mb-20">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="fw-400">Mot de passe oublié ?</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <x-jet-validation-errors class="mb-4" />
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </form>
                            <div class="col-12 learts-mb-50 mt-4">
                                <h2 class="title text-center">Vous n' avez pas encore de compte ? </h2>
                                @php
                                    $user = App\Models\User::count();
                                @endphp
                                <p class="desc text-center">rejoigner les {{ $user }} clients déjà inscrits</p>
                                <div class="row justify-center mt-4">
                                    <a href="{{ route('register') }}" class="btn btn-primary btn-outline-hover-dark">Me créer un compte</a>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login & Register Section End -->
@endsection
    