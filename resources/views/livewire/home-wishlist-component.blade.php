<div class="products row row-cols-lg-2 row-cols-md-3 row-cols-sm-2 row-cols-1">
    @if ($products ?? '')
        @php
            $wishitems = Cart::instance('wishlist')->content()->pluck('id');
        @endphp
    @foreach ($products as $product)
    <div class="col">
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
                    <img src="{{ asset($product->main_image) }}" alt="{{ $product->alt }}">
                    {{--  <img class="image-hover " src="{{ asset($product->main_image) }}" alt="{{ $product->alt }}">  --}}
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
                    @if ($wishitems->contains($product->id))
                        <a href="javascript:void();" wire:click.prevent="removeFromWishlist({{ $product->id }})" class="product-button hintT-top product-button-wish coeur" data-hint="retirer de ma liste"><i class="fas fa-heart"></i></a>
                        @else
                        <a href="javascript:void();" wire:click.prevent="addToWishlist({{ $product->id }})" class="product-button hintT-top product-button-wish" data-hint="Ajouter à ma liste"><i class="far fa-heart"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>