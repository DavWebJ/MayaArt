<div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
    <!-- Page Title/Header Start -->
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Panier</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('shop') }}">Boutique</a></li>
                            <li class="breadcrumb-item active">Panier</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Shopping Cart Section Start -->
    <div class="section section-padding">
        <div class="container">
            <form class="cart-form" action="javascript:void(0);">
                 @if(Cart::instance('cart')->count() > 0)
                <table class="cart-wishlist-table table">
                    <thead>
                        <tr>
                            <th class="name" colspan="2">Article</th>
                            <th class="price">Prix</th>
                            <th class="quantity">Quantité</th>
                            <th class="subtotal">Total</th>
                            <th class="remove">Vider</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach(Cart::instance('cart')->content() as $item)
                        <tr>
                            <td class="thumbnail"><a href="{{route('shop.show',['slug'=>$item->model->slug])}}"><img src="{{ asset($item->model->main_image) }}"></a></td>
                            <td class="name"> <a href="{{route('shop.show',['slug'=>$item->model->slug])}}">{{ $item->model->name }}</a></td>
                            <td class="price"><span>{{ $item->model->FormatPrice() }}</span></td>
                            <td class="quantity">
                                <div class="product-quantity">
                                    <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                    <input type="text" class="input-qty" value="1">
                                    <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                </div>
                            </td>
                            <td class="subtotal"><span>{{ Cart::Total() }}</span></td>
                            <td class="remove"><a wire:click.prevent="remove('{{$item->rowId}}')" class="btn"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                @else
                <div class="text-center w-full border-collapse p-6">
                    <span class="text-lg">Aucun produit dans votre panier</span>
                </div>
                @endif
                <div class="row justify-content-between mb-n3">
                    <div class="col-auto mb-3">
                        <div class="cart-coupon">
                            <input type="text" placeholder="Enter your coupon code">
                            <button class="btn"><i class="fal fa-gift"></i></button>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-light btn-hover-dark mr-3 mb-3" href="shop.html">retourner en boutique</a>
                    </div>
                </div>
            </form>
            <div class="cart-totals mt-5">
                <h2 class="title">Cart totals</h2>
                <table>
                    <tbody>
                        <tr class="subtotal">
                            <th>Subtotal</th>
                            <td><span class="amount">£242.00</span></td>
                        </tr>
                        <tr class="total">
                            <th>Total</th>
                            <td><strong><span class="amount">£242.00</span></strong></td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" wire:click.prevent="checkout" class="btn btn-dark btn-outline-hover-dark">finaliser la commande</a>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
</div>

