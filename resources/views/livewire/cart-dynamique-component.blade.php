<div class="inner">
            <div class="head">
                <span class="title">Panier</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    @forelse(Cart::instance('cart')->content() as $item)
                    <li>
                        <a href="{{route('shop.show',['slug'=>$item->model->slug])}}" class="image"><img src="{{ asset($item->model->main_image) }}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="{{route('shop.show',['slug'=>$item->model->slug])}}" class="title">{{ $item->model->name }}</a>
                            <span class="quantity-price">1 x <span class="amount">{{ $item->model->FormatPrice() }}</span></span>
                            <a href="#" wire:click.prevent="remove('{{ $item->rowId }}')"  class="remove">×</a>
                        </div>
                    </li>
                    @empty
                    <li>
                        <div class="content">
                           Votre panier est vide !
                        </div>
                    </li>
                    @endforelse
                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <strong>Sous-total:</strong>
                    <span class="amount">{{ Cart::Total() }}</span>
                </div>
                <div class="buttons">
                   @if (Cart::instance('cart')->count() > 0)
                        <a href="{{ route('customer.cart') }}" class="btn btn-dark btn-hover-primary">Voir mon panier</a>
                        <a href="{{ route('checkout.index') }}" class="btn btn-outline-dark">Finaliser ma commande</a>
                        @else
                        <a href="{{ route('customer.cart') }}" class="btn btn-dark btn-hover-primary">Visiter la boutique</a>
                   @endif
                </div>
                <p class="minicart-message"> <i class="fas fa-truck"></i> Livraison offerte à partir de 35 € d'achat !</p>
            </div>
        </div>