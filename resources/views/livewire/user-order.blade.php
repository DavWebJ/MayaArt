<div>
<div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
    <!-- Page Title/Header Start -->
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h3 class="title">Ma commande</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">retourner sur mon compte</a></li>
                            <li class="breadcrumb-item active"></li>
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
                <table class="cart-wishlist-table table">
                    <caption class="orchid title"><p>Total: {{ $order->total }}</p></caption> 
                    <thead>
                        <tr>
                            <th class="name">Article</th>
                            <th class="price">Prix</th>
                            <th class="quantity">Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_items as $item)
                            <tr>
                                <td scope="row">{{ $item->products->name }}</td>
                                <td scope="row">{{ formatPrice($item->price) }}</td>
                                <td scope="row">{{ $item->qty }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                <div class="my-4"><h4 class="orchid">statut de la commande: <span class="rose-red"> {{ $order->status }}</span></h4></div>
                </div>
                <div class="row justify-content-between mb-n3">
                    <div class="col-auto">
                        <a class="btn btn-primary btn-hover-dark mr-3 mb-3" href="{{ route('shop') }}">Continuer mes achats</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
</div>
</div>