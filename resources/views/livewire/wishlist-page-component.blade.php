<div>
    <div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1 class="title">Liste de mes souhaits</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Ma liste</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-padding">
        <div class="container">
                <table class="cart-wishlist-table table">
                    <thead>
                        <tr>
                            <th class="name" colspan="2">Article</th>
                            <th class="price">prix unité</th>
                            <th class="add-to-cart">&nbsp;</th>
                            <th class="remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (Cart::instance('wishlist')->content() as $item)
                        <tr>
                            <td class="thumbnail"><a href="{{route('shop.show',['slug'=>$item->model->slug])}}"><img src="{{ asset($item->model->main_image) }}"></a></td>
                            <td class="name"> <a href="{{route('shop.show',['slug'=>$item->model->slug])}}">{{ $item->model->name }}</a></td>
                            <td class="price"><span>{{ $item->model->FormatPrice() }}</span></td>
                            <td class="add-to-cart"><a href="javascript:void(0);" wire:click.prevent="moveProductFromWishlistToCart('{{ $item->rowId }}')" class="btn btn-primary3 btn-hover-dark"><i class="fal fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td><a href="javascript:void(0);"  wire:click.prevent="removeFromWishlistComponent({{ $item->model->id }})"  class="remove"><i class="fas fa-trash"></i></a></td>
                        </tr>
                        @empty
                        <tr>
                            <td class="name"> <a href="{{ route('shop') }}">aucun articles dans votre liste</a></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row">
                    <div class="col text-center mb-n3">
                        <a class="btn btn-primary btn-hover-dark mr-3 mb-3" href="{{ route('shop') }}">Continuer mes achats</a>
                        @if (Cart::instance('wishlist')->count() > 0)
                            <a class="btn btn-primary mb-3" href="{{ route('customer.cart') }}">Voir mon panier</a>
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>