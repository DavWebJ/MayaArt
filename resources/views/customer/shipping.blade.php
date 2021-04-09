@extends('layouts.app')

@section('title')
    livraison client
@endsection

@section('content')
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
                        <!-- <form action="{{route('shipping.store')}}" method="post">
                            @csrf
                            <input type="text" id="prenom" name="billing_prenom" placeholder="Prénom">
                            <input type="text" id="name" name="billing_name" placeholder="Nom">
                            <input type="text" id="adresse" name="billing_adress" placeholder="Adresse" required>
                            <input type="text" id="postal" name="billing_zip" placeholder="Code postal" required>
                            <input type="text" id="ville" name="billing_city" placeholder="Ville" required>

                        <h4 class="bg-green-600">adresse de livraison</h4>
                            <input type="text" id="prenom" name="shipping_prenom" placeholder="Prénom" required>
                            <input type="text" id="name" name="shipping_name" placeholder="Nom" required>
                            <input type="text" id="adresse" name="shipping_adress" placeholder="Adresse" required>
                            <input type="text" id="postal" name="shipping_zip" placeholder="Code postal" required>
                            <input type="text" id="ville" name="shipping_city" placeholder="Ville" required>
                            <button type="submit" class="btn btn-outline-warning" name="billing">Payer la commande</button>
                        </form> -->

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

@endsection