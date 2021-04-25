<section id="lastproduct" class="">
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
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Acceuil</a></span> <span>Boutique</span></p>
            <h1 class="mb-0 bread">Tous les produits</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
                         @if ($products ?? '')
                            @foreach ($products as $product)
		    			<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
		    				<div class="product">
		    					<a href="{{ route('shop.show', ['slug'=> $product->slug]) }}" class="img-prod"><img class="img-fluid" src="{{ asset($product->vignette1) }}" alt="Colorlib Template">
                                    @if ($product->price_promos ?? '')
		    						<span class="status text-white"> -{{ $product->price_promos }} €</span>
                                    @endif
		    						<div class="overlay"></div>
		    					</a>
		    					<div class="text py-3 px-3">
		    						<h3><a href="#">{{$product->name}}</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
                                        @if ($product->price_promos ?? '')
                                            <p class="price"><span class="mr-2 price-dc">{{$product->price}} €</span><span class="price-sale">{{$product->FormatPrice()}}</span></p>
                                        @else
                                            <p class="price"><span class="price-sale">{{$product->FormatPrice()}}</span></p>
                                        @endif
				    					</div>
				    					<div class="rating">
			    							<p class="text-right">
                                                @if ($product->ratings ?? '')
                                                    {!! str_repeat('<i class="fa fa-star text-yellow-400" aria-hidden="true"></i>', $product->calculateRating()) !!}
                                                    <a href="{{ route('shop.show', ['slug'=> $product->slug]) }}">{!! str_repeat('<span class="ion-ios-star-outline"></span>', 5- $product->calculateRating()) !!}</a>
                                                    @else
                                                    <a href="{{ route('shop.show', ['slug'=> $product->slug]) }}"><span class="ion-ios-star-outline"></span></a>
                                                @endif
			    							</p>
			    						</div>
			    					</div>
                                    <form  action="{{route('cart.store')}}" method="post">
			    					<p class="bottom-area d-flex px-3"> 
                                            @csrf
                                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id}}">
		    							<button  class="add-to-cart text-center py-2 mr-1"><span>Ajouter au panier <i class="ion-ios-cart ml-1"></i></span></button>
                                        </form>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
                        @endforeach
                        @else
                            <p>Aucun produit à vendre pour le moment</p>
                        @endif
		    		</div>
		    		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
                        {{ $products->appends(request()->input())->links() }}
		            </div>
		          </div>
		        </div>
		    	</div>

		    	<div class="col-md-4 col-lg-2 sidebar">
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-4">Produits:</h2>
		    			<ul>
                            <li><a href="{{route('shop')}}">Toutes les catégories<span class="badge bg-purple-200 mx-2">{{$productsCount}}</span></a> </li>
                            @foreach ($category as $cat)
                            <li><a href="{{route('shop.category',['category_slug'=>$cat->slug])}}">{{$cat->name}} <span class="badge bg-purple-200 mx-1">{{$cat->products->count()}}</span></a> </li>
                        @endforeach
		    			</ul>
		    		</div>
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-2"><a href="#">Newsletter</a></h2>
		    			<p>Filtre<span class="fas fa-filter"></span></p>
                        <div class="card">
                            <form action="#" method="post">
                                @csrf
                                <select name="searchby" id="searchby" class="form-control dropdown">
                                    <option value="" style="display: none" selected>choisisser un filtre</option>
                                    <option value="asc">prix croissant</option>
                                    <option value="desc">prix décroissant</option>
                                </select>
                            </form>
                        </div>
		    		</div>
    			</div>
    		</div>
    	</div>
    </section>

<script>
    $(function () {

        let current = $("span").attr("aria-current", "page")
            current.addClass("current-page-pagination")

    });

</script>