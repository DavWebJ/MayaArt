


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

<div class="content-about">

    <div class=" relative w-full shop-first-image">

            <h1 class="shop-h1 category-h1-{{$categories_id}} uppercase">{{$categories_name}}</h1>
        <div class="absolute promotion-home-text"><p class="font-bold ">Livraison offerte a partir de 50€ d’achat </p></div>
    </div>

</section>
<section id="shop" class="my-3">
    <div class="container">
        <h2 class="uppercase shop-title-cat">Mes produits :</h2>
        <ul class="flex product-shop-categories">
            <a class="category-all px-2 py-2 " href="{{route('shop')}}">Toutes <span class="badge "></span></a> 
            @foreach ($category as $cat)
                @if ($cat->id === 1 )
                    <a class="category-jaune px-4 py-2 " href="{{route('shop.category',['category_slug'=>$cat->slug])}}">{{$cat->name}} <span class="badge ">{{$cat->products->count()}}</span></a> 
                @elseif ($cat->id === 2 )
                    <a class="category-rose px-4 py-2  " href="{{route('shop.category',['category_slug'=>$cat->slug])}}">{{$cat->name}} <span class="badge ">{{$cat->products->count()}}</span></a> 
                @elseif ($cat->id === 3 )
                    <a class="category-orange px-4 py-2 " href="{{route('shop.category',['category_slug'=>$cat->slug])}}">{{$cat->name}} <span class="badge ">{{$cat->products->count()}}</span></a> 
                @elseif ($cat->id === 4 )
                    <a class="category-vert px-4 py-2 " href="{{route('shop.category',['category_slug'=>$cat->slug])}}">{{$cat->name}} <span class="badge ">{{$cat->products->count()}}</span></a> 
                @endif
            @endforeach
        </ul>

        <div class="dropdown-cat-mobile">

            <div class="categories-drop-boutique relative">
                <button class="dropdown-button-cat w-full jaune-background">Catégories <i class="fas fa-caret-down"></i></button>
                <ul>
                <li><a class="category-all px-2 py-2 " href="{{route('shop')}}">Toutes <span class="badge ">{{$cat->products->count()}}</span></a> </li>
                    @foreach ($category as $cat)
                        @if ($cat->id === 1 )
                            <a class="category-jaune px-4 py-2 " href="{{route('shop.category',['category_slug'=>$cat->slug])}}"><li>{{$cat->name}} <span class="badge ">{{$cat->products->count()}}</span></li></a> 
                        @elseif ($cat->id === 2 )
                            <a class="category-rose px-4 py-2  " href="{{route('shop.category',['category_slug'=>$cat->slug])}}"><li>{{$cat->name}} <span class="badge ">{{$cat->products->count()}}</span></li></a> 
                        @elseif ($cat->id === 3 )
                            <a class="category-orange px-4 py-2 " href="{{route('shop.category',['category_slug'=>$cat->slug])}}"><li>{{$cat->name}} <span class="badge ">{{$cat->products->count()}}</span></li></a> 
                        @elseif ($cat->id === 4 )
                            <a class="category-vert px-4 py-2 " href="{{route('shop.category',['category_slug'=>$cat->slug])}}"><li>{{$cat->name}} <span class="badge ">{{$cat->products->count()}}</span></li></a>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="row justify-center">
                @if ($products ?? '')
                    @foreach ($products as $product)
                    <div class="col-lg-4 my-3"> 
                        @if ($product->category_id === 1)
                        <div class=" w-4/5 shop-card card-jaune">
                            <a href="{{ route('shop.show', ['slug'=> $product->slug]) }}">
                                <div class="img-product-miniature" style="background: url('{{asset($product->vignette1)}}')">
                                    <div class="hover-article-jaune">
                                        <p class="description-article-miniature">
                                            {{ Str::limit($product->desc, 180,'') }}
                                                    @if (strlen($product->desc) > 180)
                                                    <span id="dots-{{ $product->slug }}">[...]</span>
                                                    <span id="more-{{ $product->slug }}"style="display: none;">{{ substr($product->desc, 180) }}</span>
                                                @endif
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div class="flex ">
                                <h4 class="product-jaune">{{$product->name}}</h4>
                                <div class="product-price-boutique">
                                @if ($product->price_promos ?? '')
                                    <span>prix: <del>{{$product->price}} €</del> <i class="text-red-400">{{$product->FormatPrice()}}</i></span>
                                @else
                                    <span>{{$product->FormatPrice()}}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                        @elseif ($product->category_id === 2)
                        <div class=" w-4/5 shop-card card-rose">
                            <a href="{{ route('shop.show', ['slug'=> $product->slug]) }}">
                                <div class="img-product-miniature" style="background: url('{{asset($product->vignette1)}}')">
                                    <div class="hover-article-rose">
                                        <p class="description-article-miniature">
                                            {{ Str::limit($product->desc, 180,'') }}
                                                    @if (strlen($product->desc) > 180)
                                                    <span id="dots-{{ $product->slug }}">[...]</span>
                                                    <span id="more-{{ $product->slug }}"style="display: none;">{{ substr($product->desc, 180) }}</span>
                                                @endif
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div class="flex ">
                                <h4 class="product-rose">{{$product->name}}</h4>
                                <div class="product-price-boutique">
                                @if ($product->price_promos ?? '')
                                    <span>prix: <del>{{$product->price}} €</del> <i class="text-red-400">{{$product->FormatPrice()}}</i></span>
                                @else
                                    <span>{{$product->FormatPrice()}}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                        @elseif ($product->category_id === 3)
                        <div class=" w-4/5 shop-card card-orange">
                            <a href="{{ route('shop.show', ['slug'=> $product->slug]) }}">
                                <div class="img-product-miniature" style="background: url('{{asset($product->vignette1)}}')">
                                    <div class="hover-article-orange">
                                        <p class="description-article-miniature">{{ Str::limit($product->desc, 180,'') }}
                                                    @if (strlen($product->desc) > 180)
                                                    <span id="dots-{{ $product->slug }}">[...]</span>
                                                    <span id="more-{{ $product->slug }}"style="display: none;">{{ substr($product->desc, 180) }}</span>
                                                @endif</p>
                                    </div>
                                </div>
                            </a>
                            <div class="flex ">                                                                                        
                                <h4 class="product-orange">{{$product->name}}</h4>
                                <div class="product-price-boutique">
                                @if ($product->price_promos ?? '')
                                    <span>prix: <del>{{$product->price}} €</del> <i class="text-red-400">{{$product->FormatPrice()}}</i></span>
                                @else
                                    <span>{{$product->FormatPrice()}}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                        @elseif ($product->category_id === 4)
                        <div class=" w-4/5 shop-card card-vert">
                            <a href="{{ route('shop.show', ['slug'=> $product->slug]) }}">
                                <div class="img-product-miniature" style="background: url('{{asset($product->vignette1)}}')">
                                    <div class="hover-article-vert">
                                        <p class="description-article-miniature">{{ Str::limit($product->desc, 180,'') }}
                                                    @if (strlen($product->desc) > 180)
                                                    <span id="dots-{{ $product->slug }}">[...]</span>
                                                    <span id="more-{{ $product->slug }}"style="display: none;">{{ substr($product->desc, 180) }}</span>
                                                @endif</p>
                                    </div>
                                </div>
                            </a>
                            <div class="flex ">
                                <h4 class="product-vert">{{$product->name}}</h4>                                
                                <div class="product-price-boutique">
                                @if ($product->price_promos ?? '')
                                    <span>prix: <del>{{$product->price}} €</del> <i class="text-red-400">{{$product->FormatPrice()}}</i></span>
                                @else
                                    <span>{{$product->FormatPrice()}}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        
                    </div>
                    @endforeach
                @else
                    <h4>Pas de produits en vente pour le moment</h4>
                @endif
            </div>
        </div>
        {{ $products->appends(request()->input())->links() }}
    </div>
</section>
