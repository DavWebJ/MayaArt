@section('title')
{{$product->name}}
@endsection

<div class="content-product"> 
    <section id="product_single" class="">
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
    <link rel="stylesheet" href="{{asset('css/rate.css')}}">
        <div class="row ">
            <div class="col-lg-4" >
                <img src="{{asset($product->vignette1)}}" alt="{{$product->alt}}" id="img-product">
                <div id="product_miniature_container" class="d-flex justify-start vignette my-1">
                    <img src="{{asset($product->vignette2)}}"  alt="" width="100px" class=" product-miniature-img pr-1">
                    <img src="{{asset($product->vignette3)}}"  alt="" width="100px" class=" product-miniature-img pr-1">
                    <img src="{{asset($product->vignette4)}}"  alt="" width="100px" class=" product-miniature-img pr-1">
                </div>
                    
            </div>
            <div class="col-lg-8">
                <div class="content-product-52vh">
                    <div class="flex">
                        <div class="col-lg-6 relative ">
                            <div class="product-name-rate">
                                <h2 class="product-name uppercase">{{$product->name}} </h2> 
                            </div>
                        </div>
                        <div class="col-lg-6 relative">
                            <p class="product-restant"><span > {{$product->stock}} Exemplaire(s) restant(s)</span></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-name-rate mb-2" id="rate">
                            <span id="moyenne"></span>
                                {!! str_repeat('<i class="fa fa-star text-yellow-400" aria-hidden="true"></i>', $product->calculateRating()) !!}
                                {!! str_repeat('<i class="fa fa-star-o text-gray-400" aria-hidden="true"></i>', 5- $product->calculateRating()) !!}   
                        </div>
                    </div>
                    
                    <span class="hidden" id="reste">{{$product->stock}}</span>
                    <div class="relative">
                        <div class=" product-description">
                            <h5 class="font-bold product-description-title">Description</h5>
                            <p class="product-description-text">{!! $product->desc !!}</p>
                        </div>
                    </div>
                    <div class=" product-description-mobile">
                        <h5 class="font-bold product-description-title">Description</h5>
                        <p class="product-description-text">{!! $product->desc !!}</p>
                    </div>
                </div>
                <form class="product-form" action="{{route('cart.store')}}" method="post">
                    <div class="row justify-between my-5">
                        <div class="col-lg-6 col-sm-4">
                            @if ($product->options->count() > 0)
                                <select class="select-variant" name="attr" id="attr">
                                                <option value="" selected >Sélectionner une option</option>
                                                <option value="">Produit de base</option>
                                                @foreach ($product->options as $item)
                                                    @if ($item->option_price > 0)
                                                    <option value="{{$item->id}}" data-img_src="{{asset($item->image)}}">{{$item->option}} (supplément de {{ FormatPrice($item->option_price) }})</option>
                                                    @else
                                                    <option value="{{$item->id}}" data-img_src="{{asset($item->image)}}">{{$item->option}}</option>
                                                    @endif
                                                @endforeach
                                </select>                       
                                @endif
                        </div>

                        <div class="col-lg-6 col-sm-4 price-container">
                            @if ($product->price_promos ?? '')
                                <span class="mx-5 product-price product-price-promo"><del>{{$product->price}} €</del> <i class="text-red-400">{{$product->price - $product->price_promos}} €</i></span>
                            @else
                                <span class="mx-5 product-price">{{$product->FormatPrice()}}</span> 
                            @endif
                        </div> 
                        
                    </div>
                    @if($product->stock > 0)
                        <div class="d-flex justify-between" id="product_info">
                                @csrf
                                
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id}}">
                                <button id="addproduct" class="font-bold py-2 px-4 uppercase btn">Ajouter au panier</button>
                                    
                        </div>
                        <p class="text-livraison">*livraison offerte à partir de 50 € d'achat</p>
                    @else
                        <div class="col-lg-2 h-12 bg-red-600">
                            <span>Ce produit n'est plus disponible</span>
                        </div>
                    @endif
                </form>
            </div>
            </div>
    </section>
    <section id="detail_product" class="row">
        <div class="col-lg-7">
            <h4 class="detail-title">Détail du produit</h4>
            <p class="detail-text">{!! $product->detail !!}</p>
            <h5 class=" avis-title">Les avis</h5>
            <div class="my-4">
                @forelse ($rate as $comment)
                <div class="flex py-3">
                    <div class="avis-star-name">
                        {!! str_repeat('<i class="fa fa-star text-yellow-400" aria-hidden="true"></i>', $comment->rating) !!}
                        {!! str_repeat('<i class="fa fa-star-o text-gray-400" aria-hidden="true"></i>', 5 - $comment->rating) !!}
                        <p class="text-muted font-italique text-right"> @_{{$comment->user->prenom}}</p>
                    </div>
                    <p class="avis-comment">"{{$comment->comment}}"</p> 
                </div>

                    
                    @auth
                        @if(auth()->user()->id == $comment->user_id)
                            - <a role="button" wire:click.prevent="deleteRate({{ $comment->id }})" class="btn cursor-pointer btn-outline-warning">Supprimer mon avis</a>
                        @endif
                    @endauth

                @empty
                
                <!-- <div class="flex col-span-1">
                    <div class="relative px-4 mb-16 leading-6 text-left">
                        <div class="box-border text-lg font-medium text-gray-600">
                            @guest
                                pas d'avis sur ce produis soyez le premier à le noter
                                <a class="btn avis-connexion-button" href="{{route('login')}}">Connexion</a> 
                                @else
                                pas d'avis sur ce produis soyez le premier à le noter
                            @endguest
                        </div>
                    </div>
                </div> -->
                @endforelse
                <div id="com">
                    @auth
                        @if($rating_unvalide)
                            <span class=" text-red-500 font-medium text-2xl">Votre commentaire apparaîtra bientôt.</span>
                        @elseif ($rating_valide)

                        @else
                            @livewire('product-ratings', ['product' => $product], key($product->id))
                        @endif
                    @endauth
                </div>
                @guest
                    <div class="my-4"></div>
                    <span class="fas fa-bullhorn mx-2  rounded"><i class="mx-2">Donner votre avis sur ce produit</i> </span>
                    <a class="btn avis-connexion-button" href="{{route('login')}}">Connexion</a> 
                @endguest
            </div>
        </div>

        <div class="col-lg-5">
            <div class="product-valeur2">
                    <img class="product-valeur-img" src="{{asset('img/valeur2.svg')}}" alt="">
                    <h3 class="text-center product-valeur uppercase">Fabrication <br> française</h3>
                    <p class="text-center w-4/5 valeur-description my-2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
            </div>
            <div class="product-valeur1">
                    <img class="product-valeur-img" src="{{asset('img/valeur1.svg')}}" alt="">
                    <h3 class="text-center product-valeur uppercase">100% recyclé</h3>
                    <p class="text-center w-4/5 valeur-description my-2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
            </div>
            <div class="product-valeur3">
                    <img class="product-valeur-img" src="{{asset('img/valeur3.svg')}}" alt="">
                    <h3 class="text-center product-valeur uppercase">Paiement sécurisé</h3>
                    <p class="text-center w-4/5 valeur-description my-2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
            </div>

        </div>
    
    </section>


</div>


@section('script')
<script src="{{ asset('js/boutique.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha3/js/bootstrap.js' integrity='sha512-utNtKYxs6dJjYa65JtF+qDYJfU1N9TKVNI7eNQWpnU1w40c+GNSdMIzZhy8MMpy/+23KG2cWdUUMk8WwcuWKCw==' crossorigin='anonymous'></script>
<script>
$(document).ready(function () {

        let mainImage = $("#img-product").attr('src');
        // console.log(mainImage);

        $('#product_miniature_container').append('<img src="'+ mainImage +'"  alt="" width="100px" class=" product-miniature-img pr-1">')
        //ajout d'id dans les images
        
        SetIdImage();

        // set id on each small images 


        function SetIdImage()
        {   
            
            $('.product-miniature-img').attr('id', function(i) {
            return 'miniature' + i;
            })
        }
        //  get all  small images in variable
        let C_Image = $('.product-miniature-img');
        // set the clicked image in big image container
        $(C_Image).each(function(){
            $(this).click(function(){
                    let sourceImg = $(this).attr('src');
                    $("#img-product").attr('src', sourceImg)   
            });
        });
        // rating and comment 
        $(document).on({
            mouseover: function(event) {
                $(this).find('.far').addClass('star-over');
                $(this).prevAll().find('.far').addClass('star-over');
            },
            mouseleave: function(event) {
                $(this).find('.far').removeClass('star-over');
                $(this).prevAll().find('.far').removeClass('star-over');
            }
	    }, '.rate');

	$(document).on('click', '.rate', function() {
		if ( !$(this).find('.star').hasClass('rate-active') ) {
			$(this).siblings().find('.star').addClass('far').removeClass('fas rate-active');
			$(this).find('.star').addClass('rate-active fas').removeClass('far star-over');
			$(this).prevAll().find('.star').addClass('fas').removeClass('far star-over');
		} else {

		}
    });


});

</script>
@endsection
