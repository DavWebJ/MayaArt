class Card
{
    constructor(key,client)
    {
        var stripe = Stripe(key,
        {
            locale: 'fr'
        });
        
        // Create an instance of Elements.
        var elements = stripe.elements();
       
        
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                iconColor: '##eeb5eb',
                color: '##eeb5eb',
                fontWeight: '500',
                fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
                fontSize: '16px',
                fontSmoothing: 'antialiased',
                ':-webkit-autofill': {
                    color: '#fce883',
                },
                '::placeholder': {
                    color: '#87BBFD',
                },
                },
                invalid: {
                iconColor: '#FF2768 ',
                color: '#FF2768 ',
                },
        };
        
        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style,
            hidePostalCode : false
        });
        this.Init(stripe,card,client);
    }
    // Create a Stripe client.

  Init(stripe,card,clientSecret)
  {

        let submit_b = $("#submit_b");
        submit_b.prop('disabled', true);
        $("#cgv").val(false);
        $("#cgv").prop('checked', false);


    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
  
// Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if(event.complete)
        {
             let submit_b = $("#submit_b");
            submit_b.prop('disabled', false);
        }else if (event.error) {
            displayError.classList.add('alert','alert-danger')
            displayError.textContent = event.error.message;
            submit_b.prop('disabled', true);
        } else {
             displayError.classList.remove('alert','alert-danger')
            displayError.textContent = '';
            submit_b.disabled = false;
        }
    });

    $('#cgv').on('click', function(){
        if ( $(this).is(':checked')) {
            let displayError = document.getElementById('card-errors');
            displayError.classList.remove('alert','alert-danger')
            displayError.textContent = '';
            submit_b.disabled = false;
        }
    
  });
  
    submit_b.on('click', function(ev) {
        ev.preventDefault();

    submit_b.disabled = true;
    submit_b.html("paiement en cours...");
    stripe.confirmCardPayment(clientSecret, {
        payment_method: {
        card: card,

        }
    }).then(function(result) {
        if (result.error) {
    
        submit_b.disabled = false;
        let message = result.error.message;
        this.refus();
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
                card_stripe.success();
                //let pageSuccess = '/merci';
                if(data.status == 'error')
                {
                this.refus();
                }else if (data.status == 'success')
                {
                // pageSuccess = '/merci';
                    
                    //window.location.href = pageSuccess;
                }
            
                
            }).catch((error) => {
                //erreur
                // pageSuccess = '/echec';
                // window.location.href = pageSuccess;
                console.log(error);
                card_stripe.refus();
                
            })
            
        }
        }
    });
    });

}

     refus()
    {
        let pageSuccess = '/echec';
        window.location.href = pageSuccess;
    }
     success()
    {
        let pageSuccess = '/merci';
        window.location.href = pageSuccess;
    }
}
