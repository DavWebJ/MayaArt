<div>
<div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
    <!-- Page Title/Header Start -->
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Ma commande N°</h1>
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
                        @foreach (unserialize($order->products) as $item)
                            <tr>
                            <td scope="row"></td>
                            <td scope="row">{{$item[0]}}</td>
                            <td scope="row">{{ formatPrice($item[1]) }}</td>
                            <td scope="row">{{$item[2]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-between mb-n3">
                    <div class="col-auto">
                        <a class="btn btn-light btn-hover-dark mr-3 mb-3" href="shop.html">retourner en boutique</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
</div>
</div>