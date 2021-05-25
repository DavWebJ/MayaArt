@extends('layouts.master')
@section('register')
<!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1 class="title">Page d' inscription</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Inscription</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Login & Register Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <div class="user-login-register">
                    <div class="login-register-title">
                        <h2 class="title">Inscriptions</h2>
                        <p class="desc">vous avez déjà un compte ? <a href="{{ route('login') }}">identifier vous </a></p>
                    </div>
                    <div class="login-register-form">
                        <form method="POST" id="form-login" action="{{ route('register') }}">
                            @csrf
                            <div class="row learts-mb-n50">
                                <div class="col-12 learts-mb-20">
                                    <label for="prenom">Votre Prénom <abbr class="required">*</abbr></label>
                                    <input type="text" id="prenom" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom">
                                </div>
                                <div class="col-12 learts-mb-20">
                                    <label for="name">Votre Nom <abbr class="required">*</abbr></label>
                                    <input type="text" id="name" name="name" :value="old('name')" required autofocus autocomplete="name">
                                </div>
                                <div class="col-12 learts-mb-20">
                                    <label for="email">Votre adresse E-mail <abbr class="required">*</abbr></label>
                                    <input type="email" id="email" name="email" :value="old('email')" required autofocus autocomplete="email">
                                </div>
                                <div class="col-12 learts-mb-20">
                                    <label for="password">Votre mot de passe <abbr class="required">* minimum 8 caractére, 1 chiffre, 1 majuscule et 1 caractére spéciale</abbr></label>
                                    <input type="password" name="password" required autocomplete="current-password">
                                </div>
                                <div class="col-12 learts-mb-20">
                                    <label for="password_confirmation">Confirmer votre mot de passe <abbr class="required">*</abbr></label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div>
                                    <div class="col-12 learts-mb-50">
                                        <input type="checkbox" name="terms" id="terms">
                                        <p>* J'accepte les <a href="#!" target="_blank">conditions d'utilisation</a> et <a href="#!" target="_blank">la politique de confidentialité</a></p>
                                    </div>
                                <div class="col-12 text-center learts-mb-50">
                                    <button class="btn btn-dark btn-outline-hover-dark">Inscriptions</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <x-jet-validation-errors class="mb-4" />
@endsection
