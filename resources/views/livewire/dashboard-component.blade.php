<div>
    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
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
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Mon compte</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">retour à l'acceuil</a></li>
                            <li class="breadcrumb-item active">Mon compte</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
    <!-- My Account Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row learts-mb-n30">

                <!-- My Account Tab List Start -->
                <div class="col-lg-4 col-12 learts-mb-30">
                    <div class="myaccount-tab-list nav rose-red">
                        <a href="#dashboad" class="active" data-toggle="tab">Dashboard <i class="far fa-home"></i></a>
                        <a href="#notification" data-toggle="tab">Mes notifications ({{ $new_notifications->count() }})<i class="far fa-bell"></i></a>
                        <a href="#save" data-toggle="tab">Gérer mes produits favoris ({{ Cart::instance('wishlist')->count() }})<i class="far fa-heart"></i></a>
                        <a href="#orders" data-toggle="tab">Mes Commandes <i class="far fa-shipping-fast"></i></a>
                        <a href="#download" data-toggle="tab">Mes factures <i class="far fa-file-invoice-dollar"></i></a>
                        <a href="#address" data-toggle="tab">Gérer mes adresses <i class="far fa-map-marker-alt"></i></a>
                        <a href="#account-info" data-toggle="tab">Informations personnel <i class="far fa-user"></i></a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Déconexion <i class="far fa-sign-out-alt"></i></a>
                        </form>
                    </div>
                </div>
                <!-- My Account Tab List End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-8 col-12 learts-mb-30">
                    <div class="tab-content">

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="dashboad">
                            <div class="myaccount-content dashboad orchid">
                                <p>Bonjour <strong>{{ $user->prenom }}</strong> (vous n'êtes pas <strong>{{ $user->prenom }} {{ $user->name }} ? </strong> <a href="">Me déconnecter</a>)</p>
                                <p>Bienvenue sur ton tableau de bord, d'ici tu pourras  ,  <span>gérer tes informations personnelles, </span><span> ton adresse de livraison et de facturation,</span> tes commandes  et <span> tes commentaires.</span>.</p>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="notification">
                            <div class="myaccount-content dashboad orchid">
                                <h2 class="title text-center my-4">Vos notifications de MayArt: </h2>
                                <div class="table-responsive">
                                    <table class="cart-wishlist-table table orchid">
                                        <thead>
                                            <tr>
                                                <th class="name">Titre</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($user->notifications->count() > 0)
                                            @foreach($old_notifications as $message)
                                            <tr>
                                                <td class="name"><a href="#" wire:click.prevent="readMessage({{ $message->id }})" class=" text-muted">{{ $message->title }} </a></td>
                                                <td>
                                                    <a href="#" class=" text-muted" wire:click.prevent="readMessage({{ $message->id }})"><i class="fas fa-envelope-open px-2"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @foreach($new_notifications as $message)
                                            <tr>
                                                <td class="name orchid"><a href="#" wire:click.prevent="readMessage({{ $message->id }})" class="hintT-top orchid" data-hint="Voir le nouveau message">{{ $message->title }}</a></td>
                                                <td>
                                                    <a href="#" class="hintT-top" data-hint="Voir le nouveau message" wire:click.prevent="readMessage({{ $message->id }})"><i class="fas fa-envelope px-2"></i> (nouveau message)</a> 
                                                </td>
                                            </tr>
                                            @endforeach
                                                @else
                                                <h5>vous n'avez pas de nouveau message.</h5>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- save for later-->
                        <div class="tab-pane fade" id="save">
                            <div class="myaccount-content dashboad orchid">
                                <h2 class="title text-center my-4">Mes produits favoris<span class="rose-red">({{ Cart::instance('wishlist')->count() }})</span></h2>
                                <div class="table-responsive">
                                    <table class="cart-wishlist-table table orchid">
                                        @if (Cart::instance('wishlist')->count() > 0)
                                        <caption class="text-center"><a href="#" wire:click.prevent="resetHard"><i class="fas fa-trash px-2"></i>Vider ma liste</a>
                                            <a href="#" wire:click.prevent="save"><i class="fas fa-save px-2"></i>Sauvegarder ma liste</a>
                                        </caption>
                                        @endif
                                        <thead>
                                            <tr>
                                                <th class="name text-center" colspan="2">Article</th>
                                                <th class="price text-center">Prix</th>
                                                <th class="remove text-center" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (Cart::instance('wishlist')->count() > 0)
                                            @foreach(Cart::instance('wishlist')->content() as $item)
                                            <tr>
                                                <td class="thumbnail"><a href="{{route('shop.show',['slug'=>$item->model->slug])}}"><img src="{{ asset($item->model->main_image) }}"></a></td>
                                                <td class="name"> <a href="{{route('shop.show',['slug'=>$item->model->slug])}}">{{ $item->model->name }}</a></td>
                                                <td class="price product-info text-left">
                                                    @if ($item->model->price_promos != 0)
                                                    <span class="price"><span class="old">{{ FormatPrice($item->model->price )}} </span><span class="new">{{ FormatPrice($item->model->price - $item->model->price_promos)}}</span></span>
                                                    @else
                                                        <span>{{ $item->model->FormatPrice() }}</span>
                                                    @endif
                                                </td>
                                                @if ($restored)
                                                @else
                                                    <td class="remove"><a href="#" wire:click.prevent="remove('{{$item->rowId}}')" class="btn hintT-top" data-hint="supprimer de ma liste"><i class="fa fa-times"></i></a></td>
                                                @endif
                                                <td class="remove"><a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')" class="btn hintT-top" data-hint="ajouter au panier"><i class="fa fa-cart-plus"></i></a></td>
                                            </tr>
                                            @endforeach
                                                @else
                                                <h5>vous n'avez pas encore d'articles dans votre liste</h5>
                                            @endif
                                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="orders">
                            <div class="myaccount-content order">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Transaction n°</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($order as $item)
                                                <tr>
                                                    <td>{{ $item->transaction->id }}</td>
                                                    <td>{{ Carbon\Carbon::parse($item->order_at )->locale('fr')->translatedFormat('d F Y à H\hi') }}</td>
                                                    <td class="lila">{{ $item->status }}</td>
                                                    <td>{{ FormatPrice($item->total) }}</td>
                                                    <td><a href="{{ route('dashboard.order',['transaction_id'=>$item->transaction->id]) }}"><i class="fas fa-eye"></i> Voir</a></td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td>0</td>
                                                <td>{{ Carbon\carbon::now()->format('d/m/Y') }}</td>
                                                <td>Aucune commandes en cours</td>
                                                <td>0 €</td>
                                                <td><a href="{{ route('shop') }}" class="btn btn-primary">Faire des achats</a></td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="download">
                            <div class="myaccount-content download">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Expire</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Haven - Free Real Estate PSD Template</td>
                                                <td>Aug 22, 2018</td>
                                                <td>Yes</td>
                                                <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                            </tr>
                                            <tr>
                                                <td>HasTech - Profolio Business Template</td>
                                                <td>Sep 12, 2018</td>
                                                <td>Never</td>
                                                <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="address">
                            <div class="myaccount-content address">
                                <p>Ces adresses sont actuellement celles utilisées par defaut, vous pouvez les modifier si besoin.</p>
                                <div class="row learts-mb-n30">
                                    <div class="col-md-6 col-12 learts-mb-30">
                                        @if ($billing ?? '')
                                        <h4 class="title">Adresse de facturation :<a href="#offcanvas-bill" class="edit-link offcanvas-toggle rose-red">modifier</a>
                                        </h4>
                                        <address>
                                            <p><strong>{{ $user->prenom }} {{ $user->name }}</strong></p>
                                            
                                            <p> {{ $billing->adresse }} <br>
                                                {{ $billing->ville }},  {{ $billing->zip }} <br>
                                                 {{ $billing->pays }}
                                            </p>
                                                @else
                                                <p>renseigner votre adresse de facturation</p> <br>
                                                <a href="#offcanvas-bill" class="edit-link offcanvas-toggle rose-red">Modifier l'adresse</a>
                                                @endif
                                        </address>
                                    </div>
                                    <div class="col-md-6 col-12 learts-mb-30">
                                         @if ($shipping ?? '')
                                        <h4 class="title">Adresse de livraison: <a href="#offcanvas-ship" class="edit-link offcanvas-toggle rose-red">modifier</a></h4>
                                         <p><strong>{{ $shipping->prenom }} {{ $shipping->nom }}</strong></p>
                                        <address>
                                             <p> {{ $shipping->adresse }} <br>
                                                {{ $shipping->ville }},  {{ $shipping->zip }}<br>
                                                 {{ $shipping->pays }}
                                            </p>
                                                @else
                                                <p>renseigner votre adresse de livraison</p> <br>
                                                <a href="#offcanvas-ship" class="edit-link offcanvas-toggle rose-red">Modifier l'adresse de livraison</a>
                                                @endif
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="account-info">
                            <div class="myaccount-content account-details">
                                <div class="account-details-form">
                                     <div class="col-12 learts-mb-30 learts-mt-30"> 
                                                <livewire:profile-form />
                                    </div>
                                    <div class="col-12 learts-mb-30 learts-mt-30"> 
                                         <livewire:password-change-form/>
                                        </div>
                                </div>
                            </div>
                        </div> <!-- Single Tab Content End -->

                    </div>
                </div> <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
    <!-- My Account Section End -->
    <div id="offcanvas-bill" class="offcanvas offcanvas-cart">
       @livewire('change-billing-component')
    </div>
    <div id="offcanvas-ship" class="offcanvas offcanvas-cart">
       @livewire('change-shipping-component')
    </div>
    <div class="offcanvas-overlay"></div>
</div>
