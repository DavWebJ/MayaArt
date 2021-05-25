@section('title')
{{$product->name}}
@endsection
<div>
 <link rel="stylesheet" href="{{asset('css/rate.css')}}">
    <!-- Page Title/Header Start -->
    <div class="page-title-section section" style="background-image: url({{ asset('images/bg/bg-1.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">La boutique de May Art</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('shop') }}">Boutique</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('shop') }}">Produit</a></li>
                            <li class="breadcrumb-item active">{{ $product->slug }}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Single Products Section Start -->
    <div class="section section-fluid section-padding border-bottom">
        <div class="container">
            <div class="row learts-mb-n40">
                <!-- Product Images Start -->
                <div class="col-lg-6 col-12 learts-mb-40">
                    <div class="product-images vertical">
                        <button class="product-gallery-popup hintT-left" data-hint="Clicker pour voir en plein écran" data-images='[
                                        {"src": "{{ asset($product->main_image) }}", "w": 810, "h": 1080},
                                        {"src": "assets/images/product/single/2/product-zoom-2.jpg", "w": 810, "h": 1080},
                                        {"src": "assets/images/product/single/2/product-zoom-3.jpg", "w": 810, "h": 1080},
                                        {"src": "assets/images/product/single/2/product-zoom-4.jpg", "w": 810, "h": 1080},
                                        {"src": "assets/images/product/single/2/product-zoom-5.jpg", "w": 810, "h": 1080}
                                    ]'><i class="far fa-expand"></i></button>
                                @if ($product->video ?? '')
                                      <a href="https://www.youtube.com/watch?v=1jSsy7DtYgc" class="product-video-popup video-popup hintT-left" data-hint="Lire la vidéo"><i class="fal fa-play"></i></a>
                                @endif
                      
                        <div class="product-gallery-slider">
                            <div class="product-zoom" data-image="{{ asset($product->main_image) }}">
                                <img src="{{ asset($product->main_image) }}" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/2/product-zoom-2.jpg">
                                <img src="assets/images/product/single/2/product-2.jpg" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/2/product-zoom-3.jpg">
                                <img src="assets/images/product/single/2/product-3.jpg" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/2/product-zoom-4.jpg">
                                <img src="assets/images/product/single/2/product-4.jpg" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/2/product-zoom-5.jpg">
                                <img src="assets/images/product/single/2/product-5.jpg" alt="">
                            </div>
                        </div>
                        <div class="product-thumb-slider-vertical">
                            <div class="item">
                                <img src="{{ asset($product->main_image) }}" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/single/2/product-thumb-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/single/2/product-thumb-3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/single/2/product-thumb-4.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/single/2/product-thumb-5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Images End -->

                <!-- Product Summery Start -->
                <div class="col-lg-6 col-12 learts-mb-40">
                    <div class="product-summery product-summery-center">
                        <div class="product-ratings">
                                {!! str_repeat('<i class="fas fa-star btn-outline-warning" aria-hidden="true"></i>', $product->calculateRating()) !!}
                                {!! str_repeat('<i class="far fa-star btn-outline-secondary" aria-hidden="true"></i>', 5- $product->calculateRating()) !!} 
                            <a href="#reviews" class="review-link mx-2">(<span class="count">{{ $rate->count() }}</span> avis sur ce produit)</a>
                        </div>
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <div class="product-price">{{ $product->FormatPrice() }}</div>
                        <div class="product-description">
                            <p>{!! $product->desc !!}</p>
                        </div>
                        <div class="product-variations">
                            @if ($product->stock == 0)
                                <p><span class="fa fa-ban rose-red"></span> ce produit n'est plus en stock actuellement</p>
                            @else
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="label"><span>Options couleur:</span></td>
                                        <td class="value">
                                            <div class="product-colors">
                                                <a href="#" data-bg-color="#000000"></a>
                                                <a href="#" data-bg-color="#b2483c"></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label"><span>Options:</span></td>
                                        <td class="value">
                                            <div class="product-sizes">
                                                @forelse ( $attributes as $attr )
                                                     <a href="#">{{ $attr->option }}</a>
                                                @empty
                                                    <p>pas d'option disponible pour ce produit</p>
                                                @endforelse
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label"><span>Quantity</span></td>
                                        <td class="value">
                                            <div class="product-quantity">
                                                <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                                <input type="text" class="input-qty" value="1">
                                                <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="product-buttons">
                            @php
                                $wishitems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                                @if ($wishitems->contains($product->id))
                                <a href="#" wire:click.prevent="removeFromWishlist({{ $product->id }})" class="btn btn-icon btn-primary hintT-top" data-hint="retirer de ma liste"><i class="fas fa-heart"></i></a>
                                @else
                                <a href="#" wire:click.prevent="addToWishlist({{ $product->id }})" class="btn btn-icon btn-outline-body rose-red  hintT-top" data-hint="Ajouter à ma liste"><i class="far fa-heart"></i></a>
                                @endif
                            <a href="#" class="btn btn-primary"><i class="fal fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                        
                        <div class="product-meta">
                            <table>
                                <tbody>
                                        <td class="label"><span>Catégorie:</span></td>
                                        <td class="value">
                                            <ul class="product-category">
                                                <li><a href="{{route('shop.category',['category_slug'=>$product->category->slug])}}" style="color: {{ $product->category->color}}!important;">{{ $product->category->name }}</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                        <td class="label"><span>partager sur :</span></td>
                                        <td class="va">
                                            <div class="product-share">
                                                <a  href="{{ Share::currentPage()->facebook()->getRawLinks() }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                <a href="{{ Share::currentPage()->twitter()->getRawLinks() }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                                <a href="{{ Share::currentPage()->linkedin()->getRawLinks() }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a> 
                                                <a href="{{ Share::currentPage()->pinterest()->getRawLinks() }}" target="_blank"><i class="fab fa-pinterest"></i></a>
                                                <a href="{{ Share::currentPage()->whatsapp()->getRawLinks() }}" target="_blank"><i class="fab fa-whatsapp"></i></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                             @endif
                        </div>
                    </div>
                </div>
               
                <!-- Product Summery End -->

            </div>
        </div>

    </div>
    <!-- Single Products Section End -->

    <!-- Single Products Infomation Section Start -->
    <div class="section section-padding border-bottom" id="reviews">
        <div class="container">

            <ul class="nav product-info-tab-list">
                <li><a class="active" data-toggle="tab" href="#tab-description">Description</a></li>
                <li><a data-toggle="tab" href="#tab-additional_information">Option(s) du produit</a></li>
                <li><a data-toggle="tab" href="#tab-reviews">Avis ({{ $rate->count() }})</a></li>
            </ul>
            <div class="tab-content product-infor-tab-content">
                <div class="tab-pane fade show active" id="tab-description">
                    <div class="row">
                        <div class="col-lg-10 col-12 mx-auto">
                            <p>{{  $product->detail  }}</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-additional_information">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 col-12 mx-auto">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            @forelse ($attributes as $option)
                                                <td>{{ $option->option }}</td>
                                            @empty
                                                <td>pas d'option pour ce produit</td>
                                            @endforelse
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-reviews">
                    <div class="product-review-wrapper">
                        <span class="title">{{ $rate->count() }} avis pour {{ $product->name }}</span>
                        <ul class="product-review-list">
                            @forelse ($rate as $comment)
                            <li>
                                <div class="product-review">
                                    <div class="thumb"><img src="{{ asset('images/review/review-2.jpeg') }}" alt=""></div>
                                    <div class="content">
                                        <div class="ratings">
                                            <div class="avis-star-name">
                                                {!! str_repeat('<i class="fa fa-star btn-outline-warning" aria-hidden="true"></i>', $comment->rating) !!}
                                                {!! str_repeat('<i class="fa fa-star-o text-gray-400" aria-hidden="true"></i>', 5 - $comment->rating) !!}
                                            </div>
                                        </div>
                                        @auth
                                            @if(auth()->user()->id == $comment->user_id)
                                                <a role="button" wire:click.prevent="deleteRate({{ $comment->id }})" class="btn cursor-pointer btn-outline-warning">Supprimer mon avis</a>
                                            @endif
                                        @endauth
                                        <div class="meta">
                                            <h5 class="title">{{$comment->user->prenom}}</h5>
                                            <span class="date">publié {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                        </div>
                                            <p>{{$comment->comment}}</p>
                                    </div>
                                </div>
                            </li>
                                @empty
                                @endforelse
                        </ul>
                        <span class="title">Ajouter votre avis</span>
                        <div class="review-form">
                        @auth
                            @if($rating_unvalide ?? '')
                                <span class=" text-red-500 font-medium text-2xl">Votre commentaire apparaîtra bientôt.</span>
                            @else
                                @livewire('product-ratings', ['product' => $product], key($product->id))
                            @endif
                        @endauth
                            <p class="note text-center">Seul votre prénom et votre commentaire apparaîtrons * <br>Pour laisser votre avis,  vous devez être connecter</p>
                            @guest
                                <div class="col-12 text-center learts-mb-30"><a href="{{route('login')}}" class="btn btn-dark btn-outline-hover-dark">Se Connecter</a></div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Single Products Infomation Section End -->

    <!-- Recommended Products Section Start -->
    <div class="section section-padding">
        <div class="container">
            @if ($otherproduct->count() > 0)
            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title">Mayart vous recommande aussi ces produits.</h2>
            </div>
            <!-- Section Title End -->

            <!-- Products Start -->
            <div class="product-carousel">
                @forelse ($otherproduct as $item)
                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="{{ route('shop.show', ['slug'=> $item->slug]) }}" class="image">
                                @if ($item->price_promos ?? '')
                                <span class="product-badges">
                                    <span class="onsale">
                                        -{{ $item->price_promos }} €
                                    </span>
                                </span>
                                @endif
                                <img src="{{ asset($item->main_image) }}" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s270/product-1-hover.jpg" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="{{ route('shop.show', ['slug'=> $item->slug]) }}">{{ $item->name }}</a></h6>
                            <p style="color: {{ $item->category->color}}!important;">{{ $item->category->name }}</p>
                            <span class="price">
                            @if ($item->price_promos ?? '')
                                    <span class="old">{{$item->price}} €</span>
                                    <span class="new">{{$item->FormatPrice()}}</span>
                                @else
                                    {{$item->FormatPrice()}}
                                @endif
                            </span>
                            <div class="product-buttons">
                            <a href="{{ route('shop.show', ['slug'=> $item->slug]) }}"  class="product-button hintT-top" data-hint="Voir le produit"><i class="fal fa-eye"></i></a>
                            <a href="{{ route('shop') }}" class="product-button hintT-top" data-hint="Retourner sur la boutique"><i class="fal fa-store"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                pas d'autres produits à montrer
            @endforelse
            </div>
        @endif
            <!-- Products End -->

        </div>
    </div>
    <!-- Recommended Products Section End -->
     <!-- Modal -->
    <div class="quickViewModal modal fade" id="quickViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="close" data-dismiss="modal">&times;</button>
                <div class="row learts-mb-n30">

                    <!-- Product Images Start -->
                    <div class="col-lg-6 col-12 learts-mb-30">
                        <div class="product-images">
                            <div class="product-gallery-slider-quickview">
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-1.jpg">
                                    <img src="assets/images/product/single/1/product-1.jpg" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-2.jpg">
                                    <img src="assets/images/product/single/1/product-2.jpg" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-3.jpg">
                                    <img src="assets/images/product/single/1/product-3.jpg" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-4.jpg">
                                    <img src="assets/images/product/single/1/product-4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Images End -->

                    <!-- Product Summery Start -->
                    <div class="col-lg-6 col-12 overflow-hidden learts-mb-30">
                        <div class="product-summery customScroll">
                            <div class="product-ratings">
                                <span class="star-rating">
                                <span class="rating-active" style="width: 100%;">ratings</span>
                                </span>
                                <a href="#reviews" class="review-link">(<span class="count">3</span> customer reviews)</a>
                            </div>
                            <h3 class="product-title">Cleaning Dustpan & Brush</h3>
                            <div class="product-price">£38.00 – £50.00</div>
                            <div class="product-description">
                                <p>Easy clip-on handle – Hold the brush and dustpan together for storage; the dustpan edge is serrated to allow easy scraping off the hair without entanglement. High-quality bristles – no burr damage, no scratches, thick and durable, comfortable to remove dust and smaller particles.</p>
                            </div>
                            <div class="product-variations">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>Size</span></td>
                                            <td class="value">
                                                <div class="product-sizes">
                                                    <a href="#">Large</a>
                                                    <a href="#">Medium</a>
                                                    <a href="#">Small</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Color</span></td>
                                            <td class="value">
                                                <div class="product-colors">
                                                    <a href="#" data-bg-color="#000000"></a>
                                                    <a href="#" data-bg-color="#ffffff"></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Quantity</span></td>
                                            <td class="value">
                                                <div class="product-quantity">
                                                    <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                                    <input type="text" class="input-qty" value="1">
                                                    <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product-buttons">
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-heart"></i></a>
                                <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-shopping-cart"></i> Add to Cart</a>
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-random"></i></a>
                            </div>
                            <div class="product-brands">
                                <span class="title">Brands</span>
                                <div class="brands">
                                    <a href="#"><img src="assets/images/brands/brand-3.png" alt=""></a>
                                    <a href="#"><img src="assets/images/brands/brand-8.png" alt=""></a>
                                </div>
                            </div>
                            <div class="product-meta mb-0">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>SKU</span></td>
                                            <td class="value">0404019</td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Category</span></td>
                                            <td class="value">
                                                <ul class="product-category">
                                                    <li><a href="#">Kitchen</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Tags</span></td>
                                            <td class="value">
                                                <ul class="product-tags">
                                                    <li><a href="#">handmade</a></li>
                                                    <li><a href="#">learts</a></li>
                                                    <li><a href="#">mug</a></li>
                                                    <li><a href="#">product</a></li>
                                                    <li><a href="#">learts</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Share on</span></td>
                                            <td class="va">
                                                <div class="product-share">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                                    <a href="#"><i class="fal fa-envelope"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>
    </div>
<script>
$(document).ready(function () {

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
</div>

