 <div class="inner">
            <div class="head">
                <span class="title">Liste des souhait</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    @forelse (Cart::instance('wishlist')->content() as $item)
                    <li>
                        <a href="{{route('shop.show',['slug'=>$item->model->slug])}}" class="image"><img src="{{ $item->model->main_image }}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="{{route('shop.show',['slug'=>$item->model->slug])}}" class="title">{{ $item->model->name }}</a>
                            <span class="quantity-price">1 x <span class="amount">{{ $item->model->price }}</span></span>
                            <a href="#"  wire:click.prevent="remove('{{ $item->rowId }}')" class="remove">×</a>
                        </div>
                    </li>
                    @empty
                    <li>
                        <a href="" class="image"></a>
                        <div class="content">
                            <a href="" class="title">Vous n'avez aucun article dans votre liste</a>
                        </div>
                    </li>
                    @endforelse
                </ul>
            </div>
            <div class="foot">
                <div class="buttons">
                    <a href="{{ route('product.wishlist') }}" class="btn btn-primary">Voir ma liste des souhaits</a>
                </div>
            </div>
        </div>