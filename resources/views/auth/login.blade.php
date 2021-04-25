@extends('layouts.master')
@section('login')

 <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Pas encore inscrit ? </h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-secondary px-5 py-3 mt-3">Créer un compte.</a>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Content de vous revoir ! <br>
                                Connectez vous ici</h3>
                            <form method="POST"  id="form-login" action="{{ route('login') }}" class="row contact_form" novalidate="novalidate">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" id="email" name="email" class="form-control":value="old('email')" required autofocus
                                        placeholder="Votre adresse email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input  class="form-control" type="password" name="password" required autocomplete="current-password"
                                        placeholder="Mot de passe">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Se souvenir de moi</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn btn-primary px-5 py-3 mt-3">
                                        Connexion
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-primary px-5 py-3 mt-3" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->


        <x-jet-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
@endsection
    