<div>
    @if(Session::has('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ Session::get('success') }}',
            showConfirmButton: true,
        })
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'danger',
            title: '{{ Session::get('error') }}',
            showConfirmButton: true,
        })
    </script>
    @endif
    @if(Session::has('warning'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: '{{ Session::get('warning') }}',
            showConfirmButton: true,
        })
    
    </script>
    @endif
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
                <table class="cart-wishlist-table table orchid">
                    <thead>
                        <tr>
                            <th class="name" colspan="2">Article</th>
                            <th class="price">Prix</th>
                            <th class="quantity">Quantité</th>
                            <th class="subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach(Cart::instance('cart')->content() as $item)
                        <tr>
                            <td class="thumbnail"><a href="{{route('shop.show',['slug'=>$item->model->slug])}}"><img src="{{ asset($item->model->main_image) }}"></a></td>
                            <td class="name"> <a href="{{route('shop.show',['slug'=>$item->model->slug])}}">{{ $item->model->name }}</a></td>
                            <td class="price product-info">
                                @if ($item->model->price_promos != 0)
                                <span class="price"><span class="old">{{ FormatPrice($item->model->price )}} </span><span class="new">{{ FormatPrice($item->model->price - $item->model->price_promos)}}</span></span>
                                @else
                                    <span>{{ $item->model->FormatPrice() }}</span>
                                @endif
                                
                            </td>
                            <td class="quantity">
                                <div class="product-quantity">
                                    <a href="#" class="qty-btn minus" wire:click.prevent="decrease('{{ $item->rowId }}')"><i class="ti-minus"></i></a>
                                    <input type="text" class="input-qty" value="{{ $item->qty }}" pattern="[0-9]*" max="20" min="1">
                                    <a href="#" class="qty-btn plus" wire:click.prevent="increase('{{ $item->rowId }}')"><i class="ti-plus"></i></a>
                                </div>
                            </td>
                                <td class="subtotal"><span>{{  $item->subtotal }}</span></td>
                            <td class="remove"><a wire:click.prevent="remove('{{$item->rowId}}')" class="btn hintT-top" data-hint="supprimer cet article"><i class="fa fa-times"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (!Session::has('coupon'))
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="havecoupon" name="havecoupon" value="1" wire:model="havecoupon">
                            <label class="form-check-label" for="havecoupon">j'ai un code promos</label>
                        </div>
                        <div class="row justify-content-between mb-n3">
                        @if ($havecoupon == 1)
                                <div class="col-auto mb-3">
                                    <form wire:submit.prevent="applyCoupon">
                                        <div class="cart-coupon my-4">
                                                <input type="text" id="code" name="code"  placeholder="Entrer votre code promos" wire:model="coupon">
                                        </div>
                                        <button type="submit" wire:click.prevent="applyCoupon" class="btn btn-primary" id="submit"><i class="fal fa-gift px-2"></i>Appliquer le coupon</button>
                                        </form>
                                </div>
                        @endif
                    @else
                     <div class="row justify-content-between mb-n3">
                    @endif
 
                    <div class="col-auto mb-3 ml-auto">
                            <a href="#" class="btn btn-dark" wire:click.prevent="destroy"><i class="fal fa-trash px-2"></i>Vider le panier</a>
                    </div>
                </div>
                @else
                 <div class="row justify-content-center mb-n3">
                    <div class="text-center w-full border-collapse p-6">
                        <span class="text-lg">Aucun produit dans votre panier</span>
                    </div>
                 </div>
                @endif
            </form>
            <div class="cart-totals mt-5">
                <h2 class="title">Total du panier</h2>
                <table>
                    @if (Session::has('coupon'))
                        <tbody>
                            <tr class="subtotal">
                                <th>Code coupon</th>
                                <td><span class="amount">{{ Session::get('coupon')['code'] }} <a href="#" class="rose-red hintT-top" wire:click.prevent="removeCoupon" data-hint="supprimer le coupon" ><i class="fas fa-times px-2"></i> </a></span></td>
                            </tr>
                            <tr class="subtotal">
                                <th>Prix avant remise</th>
                                <td><span class="amount">{{FormatPrice(Cart::subtotal())}}</span></td>
                            </tr>
                            <tr class="subtotal">
                                <th>Total de la remise</th>
                                <td><span class="amount">- {{ FormatPrice($discount) }}</span></td>
                            </tr>
                            <tr class="subtotal">
                                <th>Sous total après remise</th>
                                <td><span class="amount">{{FormatPrice($subtotalAfterDiscount)}}</span></td>
                            </tr>
                            <tr class="subtotal">
                                <th>Frais de livraison</th>
                                @if(IsFreeShipping())
                                <td><span class="amount"><i class="fas fa-gift lila fa-2x px-2"></i> Offert</span></td>
                                @else
                                <td><span class="amount">{{ FormatPrice(FraisDePort()) }}</span></td>
                                @endif
                            </tr>
                            <tr class="total">
                                <th>Total</th>
                                @if(IsFreeShipping())
                                <td><strong><span class="amount"> {{ FormatPrice($subtotalAfterDiscount) }}</span></strong></td>
                                @else
                                <td><strong><span class="amount">{{ FormatPrice($subtotalAfterDiscount + FraisDePort()) }}</span></strong></td>
                                @endif
                            </tr>
                        </tbody>
                    @else
                        <tbody>
                            <tr class="subtotal">
                                <th>Sous total (*)</th>
                                <td><span class="amount"> {{FormatPrice(Cart::subtotal())}}</span></td>
                            </tr>
                            <tr class="subtotal">
                                <th>Frais de livraison</th>
                                @if(IsFreeShipping())
                                <td><span class="amount"><i class="fas fa-gift lila fa-2x px-2"></i> Offert</span></td>
                                @else
                                <td><span class="amount">{{ FormatPrice(FraisDePort()) }}</span></td>
                                @endif
                            </tr>
                            <tr class="total">
                                <th>Total</th>
                                @if(IsFreeShipping())
                                <td><strong><span class="amount"> {{ FormatPrice(Total()) }}</span></strong></td>
                                @else
                                <td><strong><span class="amount">{{ FormatPrice(TotalTTC()) }}</span></strong></td>
                                @endif
                            </tr>
                        </tbody>
                    @endif
                </table>
                @if (Cart::instance('cart')->count() > 0)
                <a href="#" wire:click.prevent="checkout" class="btn btn-dark btn-outline-hover-dark">finaliser la commande</a>
                @else
                    <a href="{{ route('shop') }}" class="btn btn-primary btn-hover-dark mr-3 mb-3">Faire des achats</a>
                @endif

            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
</div>
</div>

