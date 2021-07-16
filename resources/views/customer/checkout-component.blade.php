@extends('layouts.master')
@section('checkout')
<style>
    .StripeElement {
    box-sizing: border-box;
     
    height: 40px;
     
    padding: 10px 12px;
     
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;
     
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
}
  
.StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
}
  
.StripeElement--invalid {
    border-color: #fa755a;
}
  
.StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
}
</style>
<!-- Page Title/Header Start -->
    <div class="page-title-section section mb-4" data-bg-image="images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Page de Paiement</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="breadcrumb-item active">Paiement</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

            <div class="section-title2 text-center mb-4">
                <h2 class="title">Récapitulatif de votre commande:</h2>
            </div>
            <div class="row learts-mb-n30 justify-content-around my-4">
                <div class="col-lg-6 order-lg-2 learts-mb-30">
                    <div class="order-review">
                        <h4 class="title">Vos produits:</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="name">Produit</th>
                                    <th class="total">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Cart::instance('cart')->count() > 0)
                                    @foreach (Cart::instance('cart')->content() as $item)
                                    <tr>
                                        <td class="name">{{ $item->model->name }} <strong class="quantity">×{{ $item->qty }}</strong></td>
                                        @if ($item->model->price_promos != 0)
                                        <td class="price product-info">
                                        <span class="price justify-content-end"><span class="old">{{ FormatPrice($item->model->price )}} </span><span class="new">{{ FormatPrice($item->model->price - $item->model->price_promos)}}</span></span>
                                        </td>
                                        @else
                                            <td class="total"><span>{{ FormatPrice($item->price) }}</span></td>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="name">
                                            vous n' avez aucuun  produit dans votre panier
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                            @if (Session::has('checkout'))
                                <tr class="subtotal">
                                    <th>Sous Total</th>
                                    <td><span>{{ FormatPrice(Session::get('checkout')['subtotal'] + Session::get('checkout')['discount']) }}</span></td>
                                </tr>
                                <tr class="subtotal">
                                    <th>Coupon de remise</th>
                                    @if (Session::get('checkout')['discount'] > 0)
                                        <td><span>- {{ FormatPrice(Session::get('checkout')['discount']) }}</span></td>
                                    @else
                                        <td><span>pas de coupon </span></td>
                                    @endif
                                </tr>
                                <tr class="subtotal">
                                    <th>Frais de livraison</th>
                                    @if(IsFreeShipping())
                                    <td><span class="amount"><i class="fas fa-gift lila fa-2x px-2"></i> Offert</span></td>
                                    @else
                                    <td><span class="amount">{{ FormatPrice(FraisDePort()) }}</span></td>
                                    @endif
                                </tr>
                                <tr class="total">
                                    <th>Total</th>
                                        <td><strong><span>{{ FormatPrice(Session::get('checkout')['total']) }}</span></strong></td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4 order-lg-1 learts-mb-30">
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                            <div class="card-top my-4" id="credit_cards" >
                                <img src="{{ asset('images/visa.jpg') }}" id="visa">
                                <img src="{{ asset('images/mastercard.jpg') }}" id="mastercard">
                                <img src="{{ asset('images/amex.jpg') }}" id="amex">
                            </div>
                                <h4 class="card-title orchid">
                                    Informations de paiment
                                </h4>
                            </div>
                            <div class="card-body mt-5">
                                <p class="text-center orchid">Renseigner vos informations de paiment</p>
                                <form action="{{ route('customer.paiement') }}" method="post" id="payment-form">
                                    @csrf
                                        <div id="card-element"></div>
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
                    </div>
                        <div class="form-check m-auto">
                            <input type="checkbox" class="form-check-input" name="cgv" id="cgv" value="0">
                            <label class="form-check-label rose-red" for="cgv">Vous devez accépter les *CGV pour procéder au paiement</label>
                            <a href="#">*Voir les conditions générales de vente</a>
                        </div>
                        </div>
                                <button id="submit_b" class="btn btn-stripe mt-5" type="submit">
                                        <span id="button-text"> <i class="fas fa-credit-card px-2"></i> Procéder au paiement de {{ FormatPrice(Session::get('checkout')['total']) }}</span>
                                </button>
                                <input type="hidden" id="stripeToken" name="stripeToken">
                                <div class="outcome">
                                    <div class="error"></div>
                                </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         {{-- @include('includes.card') --}}
    <!-- Checkout Section End -->
   
<script src="https://js.stripe.com/v3/"></script>

<script src="{{ asset('/js/card.js') }}"></script>
<script>
    const client_secret = "{{ $clientSecret }}"
    const card_stripe = new Card( 'pk_test_51IEul1C9XhMP61c8cf1D7BSx8zkpJaNgaDy80uql2GL6MCQfASmVUXwl0GZr54VWze6WyytsxxnWqkbXWtt1pYVC00aaDdTA5R',client_secret);
        $(function () {
          
        $("#cgv").on("click",function() {
            $("#cgv").val(this.checked)
        });

    });
</script>
</div>
@endsection
