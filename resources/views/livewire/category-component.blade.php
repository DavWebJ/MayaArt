<div>
@section('title')
    
@endsection
@section('meta')
    
@endsection
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
 <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="images/test/promos5.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Catégorie</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('shop') }}">boutique</a></li>
                            <li class="breadcrumb-item active">catégorie: {{ $categories_name }}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
    <!-- Shop Products Section Start -->
    <div class="section section-padding pt-0">

        <!-- Shop Toolbar Start -->
        <div class="shop-toolbar border-bottom">
            <div class="container">
                <div class="row learts-mb-n20">

                    <div class="col-md-auto col-12 learts-mb-20">
                        <ul class="shop-toolbar-controls">
                            <li>
                                <div class="product-sorting">
                                    <select class="form-control" id="filterby" name="filterby" wire:model="sorting">
                                        <option value="default" selected="selected">Defaut</option>
                                        <option value="date">les derniers produits</option>
                                        <option value="price_asc">par prix croissant</option>
                                        <option value="price_desc">par prix décroissant</option>
                                    </select>
                                </div>
                            </li>
                            {{--  <li>
                                <div class="product-column-toggle d-none d-xl-flex">
                                    <button class="toggle hintT-top" data-hint="5 Column" data-column="5"><i class="ti-layout-grid4-alt"></i></button>
                                    <button class="toggle hintT-top" data-hint="4 Column" data-column="4"><i class="ti-layout-grid3-alt"></i></button>
                                    <button class="toggle hintT-top active" data-hint="3 Column" data-column="3"><i class="ti-layout-grid2-alt"></i></button>
                                </div>
                            </li>   --}}
                            {{--  <li>
                                <a class="product-filter-toggle" href="#product-filter">Filtres</a>
                            </li>  --}}

                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- Shop Toolbar End -->

        <div class="section learts-mt-70">
            <div class="container">
                <div class="row learts-mb-n50">

                    <div class="col-lg-9 col-12 learts-mb-50">
                        <!-- Products Start -->
                        <div id="shop-products" class="products isotope-grid row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1" style="position: relative;">

                            {{--  <div class="grid-sizer col-1"></div>  --}}
                            @if ($products ?? '')
                            @php
                                $wishitems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @foreach ($products as $product)
                            <div class="grid-item col all {{ $product->category->name }}">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="{{ route('shop.show', ['slug'=> $product->slug]) }}" class="image">
                                            @if ($product->price_promos ?? '')
                                            <span class="product-badges">
                                                <span class="onsale">
                                                    -{{ $product->price_promos }} €
                                                </span>
                                            </span>
                                            @endif
                                            <img src="{{ $product->main_image }}" alt="image">
                                            <img class="image-hover " src="images/product/s328/product-17-hover.jpg" alt="Product Image">
                                            @if ($wishitems->contains($product->id))
                                            <a href="#" wire:click.prevent="removeFromWishlist({{ $product->id }})" class="add-to-wishlist hintT-left" data-hint="retirer de ma liste"><i class="fas fa-heart"></i></a>
                                            @else
                                            <a href="#" wire:click.prevent="addToWishlist({{ $product->id }})" class="add-to-wishlist hintT-left" data-hint="Ajouter à ma liste"><i class="far fa-heart"></i></a>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="{{ route('shop.show', ['slug'=> $product->slug]) }}">{{ $product->name }}</a></h6>
                                        <span class="price">
                                        @if ($product->price_promos ?? '')
                                           <span class="old">{{$product->price}} €</span>
                                           <span class="new">{{$product->FormatPrice()}}</span>
                                        @else
                                          {{$product->FormatPrice()}}
                                        @endif
                                        </span>
                                        <div class="product-buttons">
                                            <a href="{{ route('shop.show', ['slug'=> $product->slug]) }}"  class="product-button hintT-top" data-hint="Voir le produit"><i class="fal fa-eye"></i></a>
                                            <a href="#" wire:click.prevent="addToCart({{ $product->id }})" class="product-button hintT-top" data-hint="Ajouter au panier"><i class="fal fa-shopping-cart"></i></a>
                                            @if ($wishitems->contains($product->id))
                                            <a href="#" wire:click.prevent="removeFromWishlist({{ $product->id }})" class="product-button hintT-top product-button-wish" data-hint="retirer de ma liste"><i class="fas fa-heart"></i></a>
                                            @else
                                            <a href="#" wire:click.prevent="addToWishlist({{ $product->id }})" class="product-button hintT-top product-button-wish" data-hint="Ajouter à ma liste"><i class="far fa-heart"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <h3>aucun produits disponible dans la boutique pour le moment...</h3>
                            @endif

                        </div>
                        <!-- Products End -->
                        <div class="text-center learts-mt-70">
                            <a wire:click.prevent="loadmore" class="btn btn-dark btn-outline-hover-dark" id="more"><i class="ti-plus"></i> Voir plus de produits</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-12 learts-mb-10">

                        <!-- Search Start -->
                        <div class="single-widget learts-mb-40">
                            <div class="widget-search">
                                <form action="javascript:void(0);">
                                    <input wire:model="search" id="search" type="search" placeholder="rechercher un produit...">
                                    <button><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Search End -->

                        <!-- Categories Start -->
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Catégories de produits</h3>
                            <ul class="widget-list">
                                 <li><a href="{{route('shop')}}">Toutes </a> <span class="count">{{ $products_count }}</span></li>
                                @foreach ($categories as $cat)
                                    <li><a href="{{route('shop.category',['category_slug'=>$cat->slug])}}">{{ $cat->name }}</a> <span class="count">{{ $cat->products->count() }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Categories End -->

                        <!-- Price Range Start -->
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Filtrer par prix: </h3>
                            <div class="my-4">
                                <div class="text-center">
                                    <span class="price my-2 text-center"><i class="fa fa-tags"></i> {{ $min_price }} € - {{ $max_price }} €</span>
                                </div>
                                 <div id="slider" wire:ignore></div>
                            </div>
                        </div>
                        <!-- Price Range End -->

                        <!-- List Product Widget Start -->
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Les  + vendus</h3>
                            <ul class="widget-products">
                                <li class="product">
                                    <div class="thumbnail">
                                        <a href="product-details.html"><img src="assets/images/product/widget-1.jpg" alt="List product"></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="product-details.html">Walnut Cutting Board</a></h6>
                                        <span class="price">
                                            $100.00
                                        </span>
                                        <div class="ratting">
                                            <span class="rate" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="product">
                                    <div class="thumbnail">
                                        <a href="product-details.html"><img src="assets/images/product/widget-2.jpg" alt="List product"></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="product-details.html">Decorative Christmas Fox</a></h6>
                                        <span class="price">
                                            $50.00
                                        </span>
                                        <div class="ratting">
                                            <span class="rate" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="product">
                                    <div class="thumbnail">
                                        <a href="product-details.html"><img src="assets/images/product/widget-3.jpg" alt="List product"></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="product-details.html">Lucky Wooden Elephant</a></h6>
                                        <span class="price">
                                            $35.00
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- List Product Widget End -->

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- Shop Products Section End -->
</div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js'></script>
    <script>
        $(function () {
            let slider = document.getElementById('slider');
            noUiSlider.create(slider,{
                start:[0,200],
                connect:true,
                step:25,
                range:{
                    'min': 1,
                    'max': 200
                },
                pips:{
                    mode: 'steps',
                    stepped:true,
                    density:2
                }
            });
            slider.noUiSlider.on('update',function(value){
                @this.set('min_price',value[0]);
                @this.set('max_price',value[1]);
            });
        });
    </script>
