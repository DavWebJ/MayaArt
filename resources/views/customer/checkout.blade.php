@extends('layouts.app')

@section('title')
    paiement
@endsection

@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>

@endsection
@section('content')
    @if(Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@if(Session::has('error'))
<script>
    toastr.error("{{ Session::get('error') }}");
</script>
@endif

    <section class="container-pannier">
        <div class="row justify-between">
            <div class="col-lg-6  h-100" id="info-billing">
                <h1 class="h1-payement">INFORMATIONS DE PAIEMENT</h1>
                  <div class="row justify-between">
                    <div class="col-lg-5">
                      <div class="flex-col">
                        <h3 class="facturation-title-recap">Détails de facturation</h3>
                        <p id="prenom"><span class="font-bold">Prénom :</span>{{$shipping->user->prenom}}</p> 
                        <p id="nom"><span class="font-bold">Nom :</span>{{$shipping->user->name}}</p> 
                        <p id="email"><span class="font-bold">Email :</span>{{$shipping->user->email}}</p> 
                        <p id="adresse"><span class="font-bold">Adresse :</span>{{$shipping->billing_adress}}</p>
                        <p id="dept"><span class="font-bold">Code postal :</span>{{$shipping->billing_zip}}</p>
                        <p id="ville"><span class="font-bold">Ville :</span>{{$shipping->billing_city}}</p>
                      </div>
                    </div>
                  <div class="col-lg-5">
                    <div class="flex-col">
                      <h3 class="facturation-title-recap">Détail de livraison</h3>
                      <p><span class="font-bold">Prénom :</span> {{$shipping->user->prenom}}</p> 
                      <p><span class="font-bold">Nom :</span> {{$shipping->user->name}}</p> 
                      <p><span class="font-bold">Email :</span>{{$shipping->user->email}}</p> 
                      <p> {{$shipping->shipping_numero}}</p>
                      <p><span class="font-bold">Adresse :</span>{{$shipping->shipping_adress}}</p>
                      <p><span class="font-bold">Code postal :</span>{{$shipping->shipping_zip}}</p>
                      <p><span class="font-bold">Ville :</span>{{$shipping->shipping_city}}</p>
                    </div>
                  </div>
              </div>
              <section id="checkout" class="my-4 ">
                <div class="row">
                  <div id="payment-request">
                    <div id="payment-request-button"></div>
                    </div>
                    <div class="card col-lg-12">
                        <form id="payment-form" class="my-2 px-4 py-4" action="{{route('checkout.store')}}" method="post">
                          @csrf
                            <div id="card-element">
                            <!-- Elements will create input elements here -->
                            </div>
                                <!-- We'll put the error messages in this element -->
                            <div id="card-errors" class="element-errors"></div>
                              
                            <div class="my-4">
                              @if (request()->session()->has('coupon'))
                                @if (IsFreeShipping())
                                  <button class="btn btn-outline-primary btn-carte-paiement" id="submitB">Procéder au paiement <span class="badge">({{ FormatPrice((Total() - request()->session()->get('coupon')['remise'])) }})</span></button>
                                @else
                                 <button class="btn btn-outline-primary btn-carte-paiement" id="submitB">Procéder au paiement <span class="badge">({{FormatPrice( TotalTTC() - request()->session()->get('coupon')['remise']) }}  )</span></button>
                                @endif
                              @else
                                @if (IsFreeShipping())
                                  <button class="btn btn-outline-primary btn-carte-paiement" id="submitB">Procéder au paiement <span class="badge">({{ FormatPrice(Total() ) }})</span></button>
                                @else
                                 <button class="btn btn-outline-primary btn-carte-paiement" id="submitB">Procéder au paiement <span class="badge">({{ FormatPrice(TotalTTC()) }})</span></button>
                                @endif
                            @endif
                            </div>
                        </form>
                    </div>
                </div>
                <div class="flex mt-4">
                    <input type="checkbox" required class="" id="check_cgv">
                    <p class="px-3">J'accepte les <a href="" class="font-bold">CGV</a> (Conditions générales de ventes)</p>
                </div>
            </section>
            </div>
            <div class="col-lg-4  h-100" id="order-info">
                <h4 class="commande-resume-title font-bold">RÉSUMÉ DE VOTRE COMMANDE</h4>
                @if (!request()->session()->has('coupon'))
                  @if (IsPriceReduce())
                  <p class=" text-red-600">Un produit de votre panier est déjà en réduction. Vous ne pouvez donc pas appliquer de code promo additionnel. </p>
                  @else
                <div>
                  <p>Si vous avez un code promo, insérez-le ci-dessous</p><br>
                    <form action="{{route('cart.store.coupon')}}" method="post" id="coupon" class="flex">
                        @csrf
                        <input type="text" id="coupon" name="coupon" class="form-controll coupon-input" placeholder="Saisir votre code promo" required>
                        <div class="input-group-append border-0">
                            <button type="submit" class="mx-2 btn btn-dark px-4 rounded-pill" id="code"><i class="fas fa-gift mx-1"> Appliquer le code promo</i></button>
                        </div>
                    </form>
                </div>            
                  @endif
                <div class="my-4">
                  <p class="my-4 text-center detail-commande-title-right">Détail de la commande : </p>
                    @foreach (Cart::instance('cart')->content() as $item)
                      @if ($item->options->option_price > 0)
                          @if ($item->model->price_promos > 0)
                            <div class="col-lg-6"><img src="{{ asset($item->model->vignette1)}}"> <span>modéle de base: {{$item->model->name}} <i>prix: {{FormatPrice($item->model->price)}}</i> <br> option: {{$item->options->name_option}} (supplément: {{FormatPrice($item->options->option_price)}})</span><i class="badge vert-background text-black mx-2"> X {{$item->qty}} </i></div> <br><span>Total (option) : {{FormatPrice($item->model->price + $item->options->option_price)}}</span> <br><span>réduction : {{FormatPrice($item->model->price_promos)}}</span> <hr>
                          @else
                           <div class="col-lg-6"><img src="{{ asset($item->model->vignette1)}}"> <span>modéle de base: {{$item->model->name}} <i>prix: {{FormatPrice($item->model->price)}}</i> <br> option: {{$item->options->name_option}} (supplément: {{FormatPrice($item->options->option_price)}})</span><i class="badge vert-background text-black mx-2"> X {{$item->qty}} </i></div> <br><span>Total (option) : {{FormatPrice($item->model->price + $item->options->option_price)}}</span>  <hr>
                          @endif
                      @else
                        @if ($item->model->price_promos > 0)
                          <div class="col-lg-6"><img src="{{ asset($item->model->vignette1)}}"> <span>{{$item->model->name}} <del>prix: {{FormatPrice($item->model->price)}}</del>  </span><i class="badge vert-background text-black mx-2"> X {{$item->qty}} </i></div> <br> <span> prix après réduction : {{FormatPrice($item->model->price - $item->model->price_promos)}}</span> <hr>
                        @else
                          <div class="col-lg-6"><img src="{{ asset($item->model->vignette1)}}"> <span>{{$item->model->name}}</span><i class="badge vert-background text-black mx-2"> X {{$item->qty}} </i></div> <br>  <hr>
                        @endif
                      @endif
                    @endforeach
                    <span class="text-muted">
                    @if (IsFreeShipping())
                      Sous-total : {{ FormatPrice(Cart::instance('cart')->subtotal())}} <br>
                      Total à payer : {{ FormatPrice(Total()) }}
                    @else
                      Sous-total : {{ FormatPrice(Cart::instance('cart')->subtotal())}} <br>
                     Frais de port : {{ FormatPrice(FraisDePort()) }} <br>
                      Total à payer : {{ FormatPrice(TotalTTC()) }}
                    @endif
                    </span>
                </div>
                @else
                  <div>
                        @if (IsPriceReduce())
                               <p class=" text-red-600">Un produit de votre panier est déjà en réduction. Vous ne pouvez donc pas appliquer de code promo additionnel. </p>
                          @else
                          <p class=" text-red-600"> Un code promo est déjà appliqué sur ce panier</p><br>
                          @endif
                     
                        <form action="{{route('cart.destroy.coupon')}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"> <i class="fas fa-trash px-1"></i> Supprimer ce code promo</button>
                        </form>
                  </div>
                  <div>
                  <p class="my-4 text-center detail-commande-title-right">Détails de la commande : </p>
                    @foreach (Cart::instance('cart')->content() as $item)
                          <div class="col-lg-6"><img src="{{ asset($item->model->vignette1)}}"> <span>{{$item->model->name}}</span><i class="badge vert-background text-black mx-2"> X {{$item->qty}} </i></div> <br>  <hr>
                    @endforeach
                    <span class="text-muted">
                    @if (IsFreeShipping())
                      @if ($item->model->price_promos > 0)
                        Promotion sur ce produit: {{$item->model->price_promos}}
                      @else
                      @endif
                      Total sans remise : {{ FormatPrice(Cart::instance('cart')->subtotal())}} <br>
                      Total de la remise : {{ FormatPrice(request()->session()->get('coupon')['remise']) }} <br> 
                      Total à payer : {{ FormatPrice((Cart::instance('cart')->subtotal() - request()->session()->get('coupon')['remise'])) }}
                    @else
                      Frais de livraison : {{ FormatPrice(FraisDePort())}} <br>
                      Total sans remise : {{ FormatPrice(TotalTTC())}} <br>
                      Total de la remise : {{ FormatPrice(request()->session()->get('coupon')['remise']) }} <span class="mx-5 product-price-promo"><del> {{ FormatPrice(TotalTTC())}} </del> <i class="text-red-400">{{FormatPrice( request()->session()->get('coupon')['remise'] - TotalTTC()) }}  </i></span> <br>
                      Total à payer : {{ FormatPrice((TotalTTC() - request()->session()->get('coupon')['remise'])) }}
                    @endif
                    </span>
                </div>
                @endif
            </div>
        </div>
    </section>

    

@endsection
@section('stripejs')
<script>


  //Suppression de la barre de navigation
  var stripe = Stripe('pk_test_51IEul1C9XhMP61c8cf1D7BSx8zkpJaNgaDy80uql2GL6MCQfASmVUXwl0GZr54VWze6WyytsxxnWqkbXWtt1pYVC00aaDdTA5R', {
      locale: 'fr'
  });
    var elements = stripe.elements();

  var elementStyles = {
    base: {
      
      color: '#000',
      fontWeight: 600,
      fontFamily: 'Quicksand, Open Sans, Segoe UI, sans-serif',
      fontSize: '16px',
      fontSmoothing: 'antialiased',

      ':focus': {
        color: '#424770',
      },

      '::placeholder': {
        color: '#9BACC8',
      },

      ':focus::placeholder': {
        color: '#CFD7DF',
      },
    },
    invalid: {
      color: '#fff',
      ':focus': {
        color: '#FA755A',
      },
      '::placeholder': {
        color: '#FFCCA5',
      },
    },
  };
  
  var elementClasses = {
    focus: 'focus',
    empty: 'empty',
    invalid: 'invalid',
  };
var card = elements.create("card", 
{ 
  style: elementStyles ,
  hidePostalCode:true 
});
card.mount("#card-element");
var submitB = document.getElementById('submitB');
card.on('ready', function(event) {
    document.getElementById('submitB').disabled = true;
});
card.on('change', function(event) {
  let displayError = document.getElementById('card-errors');
  if (event.complete) {
    submitB.disabled = false;
  }
  else if (event.error) {
    submitB.disabled = true;
    displayError.classList.add('alert','alert-danger')
    displayError.textContent = event.error.message;
  } 
  else if(event.empty)
  {
    submitB.disabled = true;
  }
   else {
    displayError.classList.remove('alert','alert-danger')
    displayError.textContent = '';
    submitB.disabled = false;
  }
});

$('#check_cgv').on('click', function(){
  if ( $(this).is(':checked')) {
    let displayError = document.getElementById('card-errors');
    displayError.classList.remove('alert','alert-danger')
    displayError.textContent = '';
    submitB.disabled = false;
  }
    
  });

submitB.addEventListener('click', function(ev) {
  ev.preventDefault();
  if ( !$('#check_cgv').is(':checked')) {
    let displayError = document.getElementById('card-errors');
    displayError.classList.add('alert','alert-danger')
    displayError.textContent = 'Veuillez valider les CGV';
    submitB.disabled = true;
    return;
  }
  
  submitB.disabled = true;
  stripe.confirmCardPayment("{{ $clientSecret }}", {
    payment_method: {
      card: card,
      billing_details: {
        address: {
            city: document.getElementById('ville'),
            line1: document.getElementById('adresse'),
            postal_code: document.getElementById('dept'),
        },
        email:document.getElementById('email'),
        name: document.getElementById('nom'),
      }
    }
  }).then(function(result) {
    if (result.error) {
  
      submitB.disabled = false;
      let message = result.error.message;
      refus();
   

    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Success payement
        var paymentIntent = result.paymentIntent;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var form = document.getElementById('payment-form');
        var url = form.action;
        
        fetch(
            url,
            {
                headers:
                {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'post',
                body: JSON.stringify({
                    payment_intent:paymentIntent
                })
            }
        ).then((data) => {
            //paiement success
            success();
            //let pageSuccess = '/merci';
            if(data.status == 'error')
            {
              refus();
            }else if (data.status == 'success')
            {
               // pageSuccess = '/merci';
                
                //window.location.href = pageSuccess;
            }
          
            
        }).catch((error) => {
            //erreur
            // pageSuccess = '/echec';
            // window.location.href = pageSuccess;
            refus();
            
        })
        
      }
    }
  });
});
function refus()
{
    let pageSuccess = '/echec';
    window.location.href = pageSuccess;

}

function success()
{
    let pageSuccess = '/merci';
    window.location.href = pageSuccess;

}
</script>
@endsection