@extends('layouts.master')

@section('title')
Informations et facturations
@endsection

@section('shipping')
<!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Informations requise</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="breadcrumb-item active">Facturation et livraison</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
 <!-- Checkout Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="section-title2">
                <h2 class="title">Informations de facturation</h2>
            </div>
            <form class="checkout-form learts-mb-50" action="{{route('shipping.store')}}" id="form" method="post">
                @csrf
                @method('post')
                @include('includes.errors')
                <div class="row">
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdFirstName">Prénom <abbr class="required">*</abbr></label>
                        <input type="text" id="prenom" name="prenom" value="{{ $billing->prenom  ?? auth()->user()->prenom}}" required >
                        @error('prenom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdLastName">Nom <abbr class="required">*</abbr></label>
                        <input type="text" id="nom" name="nom" value="{{ $billing->nom ?? auth()->user()->name }}" required >
                        @error('nom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdCountry">Pays<abbr class="required">*</abbr></label>
                        <select id="pays" class="custom-select form-control" name="pays" >
                            <option value="{{ $billing->pays  ?? 'france'}}" selected>France </option>
                        </select>
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdAddress1">Adresse <abbr class="required">*</abbr></label>
                        <input type="text" id="adresse" name="adresse" placeholder="votre adresse" value="{{ $billing->adresse ?? '' }}"  required>
                        @error('adresse')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdTownOrCity">Ville <abbr class="required">*</abbr></label>
                        <input type="text" id="ville" name="ville" placeholder="votre ville"  value="{{ $billing->ville ?? ''}}" required>
                            @error('ville')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdPostcode">Code postal <abbr class="required">*</abbr></label>
                        <input type="text" id="zip" name="zip" pattern="[0-9]*" maxlength="5" placeholder="votre departement *****" value="{{ $billing->zip ?? '' }}"  required>
                        @error('zip')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdEmail">Email <abbr class="required"> <span class="rose-red">* non modifiable</span></abbr></label>
                        <input type="text" id="email" name="email" value="{{ $billing->email  ??  auth()->user()->email }}" placeholder="{{ auth()->user()->email }}" readonly required>
                        @error('email')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            <div class="section-title2 my-2">
                <label class="rose-red" for="shipping">l'adresse de livraison est différente de l'adresse de facturation ?</label>
                     <input type="checkbox" class="shipping" name="ship_is_diff" id="shipping" value="0">
            </div>
            <div class="checkout-form learts-mb-50" id="shipping_container">
                <h2 class="title">Adresse de livraison </h2>
                @include('includes.errors')
                <div class="row">
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="prenom">Prénom <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_prenom" name="shp_prenom" value="{{ $billing->prenom ?? '' }}">
                        @error('shp_prenom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="nom">Nom <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_nom" name="shp_nom" value="{{ $billing->nom ?? ''}}">
                        @error('shp_nom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="pays">Pays<abbr class="required">*</abbr></label>
                        <select id="shp_pays" class="custom-select form-control" name="shp_pays">
                            <option value="{{ $billing->pays ?? 'france' }}" selected style="display:none;">Selectionnez votre pays…</option>
                            <option value="France">France </option>
                        </select>
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="adresse">Adresse <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_adresse" name="shp_adresse" placeholder="4 rue de la couture" value="{{ $billing->adresse ?? ''}}">
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="ville">Ville <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_ville" name="shp_ville"  placeholder="Paris" value="{{ $billing->ville ?? ''}}">
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="zip">Code postal <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_zip" name="shp_zip"  pattern="[0-9]*" minlength="2" maxlength="5" value="{{ $billing->zip ?? ''}}">
                        @error('shp_zip')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="mail">Email <abbr class="required">* non modifiable</abbr></label>
                        <input type="text" id="shp_email" name="email" value="{{ $billing->email  ?? auth()->user()->email}}" placeholder="{{ auth()->user()->email }}" readonly >
                        @error('shp_email')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                        </div>
                            </div>
                            
                                <button id="submit" class="btn btn-stripe mt-5" type="submit">
                                        <span id="button-text"> <i class="fas fa-credit-card px-2"></i> Procéder au paiement</span>
                                </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="container-pannier ">
    <div class="row justify-between">
        <section id="shipping" class="col-lg-8 h-100">
                <div class=" container-fluid">
                    <div class=" h-100" id="info-billing">
                        <h1 class="h1-payement">Informations de paiement</h4>

                        <h2 class="facturation-title">Adresse de facturation</h4>
                        @if ($shipping ?? '')
                        <form action="{{route('shipping.store')}}" method="post" class="form-payement">
                            @csrf
                            <div class="row justify-between">
                                <input class=" col-lg-5   input-payement" type="text" id="prenom" name="billing_prenom" placeholder="Prénom" value="{{$shipping->user->prenom}}">
                                <input class=" col-lg-5 input-payement" type="text" id="name" name="billing_name" placeholder="Nom" value="{{$shipping->user->name}}">
                            </div>
                            
                            <input class="input-payement"  type="text" id="adresse" name="billing_adress" placeholder="Adresse" required value="{{$shipping->billing_adress}}">
                            <div class="row justify-between">
                                <input class=" col-lg-5 input-payement" type="text" id="postal" name="billing_zip" placeholder="Code postal" required value="{{$shipping->billing_zip}}">
                                <input class=" col-lg-5 input-payement" type="text" id="ville" name="billing_city" placeholder="Ville" required value="{{$shipping->billing_city}}">
                            </div>
                            
                            
                        <h2 class="livraison-title">Adresse de livraison</h4>

                        <div class="row justify-between">
                            <input class="col-lg-5 input-payement" type="text" id="prenom" name="shipping_prenom" placeholder="Prénom" required value="{{$shipping->user->prenom}}">
                            <input class="col-lg-5 input-payement" type="text" id="name" name="shipping_name" placeholder="Nom" required value="{{$shipping->user->name}}">
                        </div>
                        <input class="input-payement" type="text" id="adresse" name="shipping_adress" placeholder="Adresse" required value="{{$shipping->shipping_adress}}">
                        <div class="row justify-between">
                            <input class="col-lg-5 input-payement" type="text" id="postal" name="shipping_zip" placeholder="Code postal" required value="{{$shipping->shipping_zip}}">
                            <input class="col-lg-5 input-payement" type="text" id="ville" name="shipping_city" placeholder="Ville" required value="{{$shipping->shipping_city}}">
                        </div>
                            
                            
                            
                            <button type="submit" class="playfair commande-payement-button font-bold uppercase text-center" name="billing">payer la commande</button>
                        </form>
                        @else

                        <form action="{{route('shipping.store')}}" method="post" class="form-payement">
                            @csrf
                            <div class="row justify-between">
                                <input class=" col-lg-5   input-payement" type="text" id="prenom" name="billing_prenom" placeholder="Prénom" >
                                <input class=" col-lg-5 input-payement" type="text" id="name" name="billing_name" placeholder="Nom" >
                            </div>
                            
                            <input class="input-payement"  type="text" id="adresse" name="billing_adress" placeholder="Adresse" required >
                            <div class="row justify-between">
                                <input class=" col-lg-5 input-payement" type="text" id="postal" name="billing_zip" placeholder="Code postal" required >
                                <input class=" col-lg-5 input-payement" type="text" id="ville" name="billing_city" placeholder="Ville" required >
                            </div>
                            
                            
                            <h2 class="livraison-title">Adresse de livraison</h4>

                            <div class="row justify-between">
                                <input class="col-lg-5 input-payement" type="text" id="prenom" name="shipping_prenom" placeholder="Prénom" required >
                                <input class="col-lg-5 input-payement" type="text" id="name" name="shipping_name" placeholder="Nom" required >
                            </div>
                            <input class="input-payement" type="text" id="adresse" name="shipping_adress" placeholder="Adresse" required>
                            <div class="row justify-between">
                                <input class="col-lg-5 input-payement" type="text" id="postal" name="shipping_zip" placeholder="Code postal" required >
                                <input class="col-lg-5 input-payement" type="text" id="ville" name="shipping_city" placeholder="Ville" required >
                            </div>  
                                <button type="submit" class="playfair commande-payement-button font-bold uppercase text-center" name="billing">payer la commande</button>
                        </form>
                        @endif
                    </div>
            </section>
            <section class="col-lg-3">
                <div class="resume-container">
                    <div class="commande-resume"> 
                        <h3 class="commande-resume-title uppercase font-bold ">Résumé de votre commande</h3>
                        @if (  IsFreeShipping() )
                        <p>Total TTC:  {{FormatPrice(Total())}}</p>  <br>
                        <span>frais de livraison : offert </span>
                                    
                        @else
                                    <span>Frais de livraison: {{FormatPrice(FraisDePort())}}</span> <br>
                                    <span>Sous Total: (hors frais de port): {{FormatPrice(Total())}}</span> <br>
                                    <p>Total TTC:  {{ FormatPrice(TotalTTC()) }}</p> 
                                    <p class=" text-muted text-gray-700">*livraison offerte à partir de 50 € d'achat</p>
                                    
                        @endif
                        
                    </div>
                    <div class="commande-pay">
                        <div class="flex justify-between commande-pay-total ">
                            <h3 class="commande-pay-title font-bold ">Total</h3>
                            @if (  IsFreeShipping()  )
                            <p class="font-bold playfair commande-pay-price"> {{FormatPrice(Total())}}</p>
                            @else
                            <p class="font-bold playfair commande-pay-price"> {{ FormatPrice(TotalTTC()) }}</p>
                            @endif
                        </div>

                        
                    </div>   
                </div>
        </section>

    </div>
</div>
<script>
    $(function () {
   
        let shipp = $('#shipping_container');
        shipp.hide();
        $("#shipping").on("click",function() {
            $("#shipping_container").toggle(this.checked);
            $("#shipping").val(this.checked)
        });

    });

</script>
@endsection